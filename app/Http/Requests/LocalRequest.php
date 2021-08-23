<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'file' => 'required_without:id|mimes:jpg,jpeg,png',
            'password_confirm' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'details' => 'required',
            'color' => 'required',
            'length' => 'required',
            'width' => 'required',
            'wood' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'required_without:id' => 'هذا الحقل مطلوب'

        ];
    }
}
