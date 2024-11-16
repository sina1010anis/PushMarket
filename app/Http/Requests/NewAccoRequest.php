<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAccoRequest extends FormRequest
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
            'total' => 'required',
            'indebted' => 'required',
            'creditor' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'total.required' => 'لطفا موجودی را وارد کنید',
            'indebted.required' => '(در صورت نبود 0 وارد کنید)لطفا بدهکاری را وارد کنید',
            'creditor.required' => '(در صورت نبود 0 وارد کنید)لطفا بستانکاری را وارد کنید',
        ];
    }
}
