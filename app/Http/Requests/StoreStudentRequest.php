<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'father_name' => [
                'required',
                'string',
                'max:255',
            ],
        ];

        // Email rules
        $emailPrefix = 'student_email_details.*.';
        $emailRules = [
            $emailPrefix.'email' => [
                'required',
                'email',
            ],
        ];

        // Phone rules
        $phonePrefix = 'student_phone_details.*.';
        $phoneRules = [
            $phonePrefix.'phone' => [
                'required',
                'string',
                'max:24',
            ],
        ];

        return collect($rules)
            ->merge(collect($emailRules))
            ->merge(collect($phoneRules))
            ->toArray();
    }
}