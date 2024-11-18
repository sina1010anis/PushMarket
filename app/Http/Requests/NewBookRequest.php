<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBookRequest extends FormRequest
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
            'title' => 'required|min:3|max:128',
            'body' => 'required|min:3|max:1028',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا موضوع را وارد کنید',
            'title.min' => 'موضوع یادداشت نمیتواند کمتر از 4 حرف باشد',
            'title.max' => 'موضوع یادداشت نمیتواند بیشتر از 128 حرف باشد',
            'body.required' => 'لطفا متن را وارد کنید',
            'body.min' => 'متن یادداشت نمیتواند کمتر از 4 حرف باشد',
            'body.max' => 'متن یادداشت نمیتواند بیشتر از 128 حرف باشد',
        ];
    }
}
