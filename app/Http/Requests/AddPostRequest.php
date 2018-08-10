<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'txtTitle'      =>  'required|unique:posts,title',
            'txtContent'    =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'txtTitle.required'     =>  'Không được để trống tiêu đề',
            'txtContent.required'   =>  'Không được để trống nội dung',
            'txtTitle.unique'       =>  'Tiêu đề bài viết đã tồn tại',
        ];
    }
}
