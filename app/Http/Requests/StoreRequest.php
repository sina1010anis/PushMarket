<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'location'=>'required',
            'total_number'=>'required',
            'box'=>'required',
        ];
    }

    public function messages() :array
    {
        return [
            'name.required'=>'لطفا نام را وارد کنید',
            'price.required'=>'لطفا قیمت را وارد کنید',
            'location.required'=>'لطفا محل را وارد کنید',
            'total_number.required'=>'لطفا تعداد تک را وارد کنید',
            'box.required'=>'لطفا تعداد جعبه را وارد کنید',
        ];
    }
}
