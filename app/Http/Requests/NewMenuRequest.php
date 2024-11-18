<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewMenuRequest extends FormRequest
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
            'name' => 'required|min:3|max:128'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام را وارد کنید',
            'name.min' => 'نام دسته نمیتواند کمتر از 4 حرف باشد',
            'name.max' => 'نام دسته نمیتواند بیشتر از 128 حرف باشد',
        ];
    }
}
