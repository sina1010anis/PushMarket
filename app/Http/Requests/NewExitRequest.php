<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewExitRequest extends FormRequest
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
            'name' => 'required',
            'desc' => 'required',
            'total_number' => 'required',
            'box' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام را وارد کنید.',
            'desc.required' => 'بخش توضیحات نباید خالی باشد',
            'total_number.required' => 'لطفا تعداد کل را وارد کنید.',
            'box.required' => 'لطفا تعداد کل جعبه را وارد کنید.',
        ];
    }
}
