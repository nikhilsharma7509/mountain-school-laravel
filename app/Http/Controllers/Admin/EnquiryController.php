<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $enquiries = Enquiry::query()
            ->when(in_array($status, ['New', 'Contacted', 'Closed']), fn($q) => $q->where('status', $status))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('parent_name', 'like', "%{$search}%")
                        ->orWhere('student_name', 'like', "%{$search}%")
                        ->orWhere('mobile', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.enquiries.index', compact('enquiries', 'status', 'search'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry): JsonResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:New,Contacted,Closed'],
        ]);

        $enquiry->update(['status' => $validated['status']]);

        return response()->json([
            'status' => 'success',
            'message' => 'Enquiry status updated to ' . $enquiry->status,
            'new_status' => $enquiry->status,
        ]);
    }
}
