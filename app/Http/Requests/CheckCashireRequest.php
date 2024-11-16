<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckCashireRequest extends FormRequest
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
            'username' => 'required|min:3|max:20',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'با دقت بیشتری نام کاربری را وارد کنید',
            'username.min' => 'با دقت بیشتری نام کاربری را وارد کنید',
            'username.max' => 'با دقت بیشتری نام کاربری را وارد کنید',
            'password.required' => 'با دقت بیشتری رمزعبور را وارد کنید',
        ];
    }
}
