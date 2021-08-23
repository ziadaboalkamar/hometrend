<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'cover' => 'required_without:id|mimes:jpg,jpeg,png',
            'category' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'password_confirm' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'about_us' => 'required',
            'price' => 'required',
            'graduated' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'required_without:id' => 'هذا الحقل مطلوب',
            'unique' => 'هذا الايميل مستخدم يرجى استخدام ايميل اخر',
        ];
    }
}
