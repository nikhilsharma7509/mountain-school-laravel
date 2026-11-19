<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class EnquiryController extends Controller
{
    public function store(StoreEnquiryRequest $request): JsonResponse
    {
        $enquiry = Enquiry::create([
            'parent_name' => $request->parent_name,
            'student_name' => $request->student_name,
            'class_applying_for' => $request->class_applying_for,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 'New',
            'crm_status' => 'Pending',
        ]);

        $webhookUrl = config('services.crm.webhook_url');

        if (!empty($webhookUrl)) {
            try {
                $response = Http::timeout(5)
                    ->acceptJson()
                    ->post($webhookUrl, [
                        'enquiry_id' => $enquiry->id,
                        'parent_name' => $enquiry->parent_name,
                        'student_name' => $enquiry->student_name,
                        'class_applying_for' => $enquiry->class_applying_for,
                        'mobile' => $enquiry->mobile,
                        'email' => $enquiry->email,
                        'message' => $enquiry->message,
                        'submitted_at' => $enquiry->created_at->toIso8601String(),
                    ]);

                if ($response->successful()) {
                    $enquiry->update([
                        'crm_status' => 'Sent',
                        'crm_response' => 'HTTP ' . $response->status(),
                    ]);
                } else {
                    $enquiry->update([
                        'crm_status' => 'Failed',
                        'crm_response' => 'HTTP ' . $response->status() . ': ' . mb_substr($response->body(), 0, 250),
                    ]);
                    Log::error('CRM Webhook returned non-2xx response', [
                        'enquiry_id' => $enquiry->id,
                        'status' => $response->status(),
                    ]);
                }
            } catch (Throwable $e) {
                $enquiry->update([
                    'crm_status' => 'Failed',
                    'crm_response' => mb_substr($e->getMessage(), 0, 250),
                ]);
                Log::error('CRM Webhook push failed', [
                    'enquiry_id' => $enquiry->id,
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            $enquiry->update([
                'crm_status' => 'Failed',
                'crm_response' => 'CRM_WEBHOOK_URL not configured.',
            ]);
            Log::warning('CRM_WEBHOOK_URL is empty for enquiry ID: ' . $enquiry->id);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! Your admission enquiry has been submitted successfully. Our counselor will contact you shortly.',
        ], 201);
    }
}
