<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLockRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'لطفا نام کاربری را وارد کنید',
            'password.required' => 'لطفا رمز عبور را وارد کنید',
        ];
    }
}
