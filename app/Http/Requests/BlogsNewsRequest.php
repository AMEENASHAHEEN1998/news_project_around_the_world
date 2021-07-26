<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsNewsRequest extends FormRequest
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
            'blog_name_ar' =>'required',
            'blog_name_en' =>'required',
            'news_category_name' => 'required',
            'note_ar' => 'required',
            'note_en'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'blog_name_ar.required' => trans('validation.required'),
            'blog_name_en.required' => trans('validation.required'),
            'news_category_name.required' => trans('validation.required'),
            'note_ar.required' => trans('validation.required'),
            'note_en.required' => trans('validation.required'),
        ];
    }
}
