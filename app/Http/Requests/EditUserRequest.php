<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EditUserRequest extends FormRequest
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
            'username' => 'required|max:200',
            'email' =>  [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($this->route('id')),
                        ],
            'pass1' => 'required|min:6',
            'pass2' => 'same:pass1',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Họ và tên không được để trống',
            'username.max'  => 'Họ và tên tối đa 200 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'pass1.required' => 'Mật khẩu không được để trống',
            'pass1.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'pass2.same' => '2 mật khẩu nhập không khớp',
        ];
    }
}
