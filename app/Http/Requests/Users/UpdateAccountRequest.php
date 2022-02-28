<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
        $str = $_SERVER['REQUEST_URI'];
        preg_match_all('!\d+!', $str, $user_id);

        $user_id =(int) $user_id[0][0];

        return [
//            'name' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,'. $user_id,
//            'password' => 'nullable|string|min:6',
        ];
    }
    public function messages()
    {
        return [
//            'name.required' => 'إسم المستخدم مطلوب',
            'userName.required' => 'إسم المستخدم البطاقة',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'البريد الإلكتروني موجود مسبقاً',
        ];
    }
}
