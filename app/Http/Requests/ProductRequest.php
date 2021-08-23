<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png,webp',
            'price' =>'required| max:100',
            'size' =>'required',
            'name' =>'required|string| max:100',
            'category_id' =>'required|exists:categories,id',
            'image' => 'required'

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
