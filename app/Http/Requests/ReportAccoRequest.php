<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportAccoRequest extends FormRequest
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
        return [
            'date_as' => 'required',
            'date_ta' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'date_as.required' => 'لطفا تاریخ را وارد کنید',
            'date_ta.required' => 'لطفا تاریخ را وارد کنید',
        ];
    }
}
