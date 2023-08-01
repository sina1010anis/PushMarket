<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'price' => 'required|min:3',
            'barcode' => 'required|min:5',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'لطفا نام را وارد کنید',
            'name.min' => 'نام کمتر از 5 حرف نمیتواند باشد',
            'price.min' => 'قیمت  کمتر از 3 حرف نمیتواند باشد',
            'barcode.min' => 'بارکد  کمتر از 5 حرف نمیتواند باشد',
            'name.max' => 'نام بیشتر از 255 حرف نمیتواند باشد',
            'price.required' => 'لطفا قیمت را وارد کنید',
            'barcode.required' => 'لطفا بارکد را وارد کنید',
        ];
    }
}
