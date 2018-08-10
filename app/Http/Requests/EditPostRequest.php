<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EditPostRequest extends FormRequest
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
            'txtTitle' =>   'required|unique:posts,title,'.$this->id,
            'txtContent' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txtTitle.required' => 'Bạn vui lòng nhập tiêu đề',
            'txtTitle.unique'  => 'Bạn vui lòng nhập lại tiêu đề, tiêu đề đã bị sử dụng',
            'txtContent.required' => 'Bạn vui lòng nhập nội dung',
        ];
    }
}
