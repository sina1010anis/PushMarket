<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewNewsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'لطفا موضوع را وارد کنید.',
            'body.required' => 'لطفا بدنه را وارد کنید.',
        ];
    }
}
