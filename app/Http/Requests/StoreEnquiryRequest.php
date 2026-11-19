<?php

namespace App\Http\Requests;

use App\Models\Enquiry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $mobile = preg_replace('/^\+91|\s+|-/', '', (string) $this->mobile);
        $this->merge(['mobile' => $mobile]);
    }

    public function rules(): array
    {
        return [
            'parent_name' => ['required', 'string', 'max:120'],
            'student_name' => ['required', 'string', 'max:120'],
            'class_applying_for' => ['required', 'in:Playgroup,Nursery,Junior KG,Senior KG'],
            'mobile' => ['required', 'regex:/^[6-9]\d{9}$/'],
            'email' => ['nullable', 'email', 'max:150'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'mobile.regex' => 'Please enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9.',
        ];
    }

    protected function passedValidation(): void
    {
        $exists = Enquiry::where('mobile', $this->mobile)
            ->where('class_applying_for', $this->class_applying_for)
            ->where('created_at', '>=', now()->subHours(24))
            ->exists();

        if ($exists) {
            throw new HttpResponseException(response()->json([
                'status' => 'duplicate',
                'message' => 'We have already received your enquiry.',
            ], 409));
        }
    }
}
