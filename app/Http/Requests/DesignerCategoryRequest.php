<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignerCategoryRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'category_name' => 'required',

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
