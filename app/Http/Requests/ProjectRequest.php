<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'address' =>'required|string',
            'date' =>'required',
            'description' =>'required',
            'title' =>'required|string| max:100',


        ];
    }

    public function messages()
    {
        return [
            'required'=>"هذا الحقل مطلوب.",
            'name.string' =>'يجب ادخال الاسم في الاحراف.',
            'max'=>'هذا الحقل طويل للغاية.',
            'category_id.exists' => 'هذا القسم غير موجود',

        ];
    }
}
