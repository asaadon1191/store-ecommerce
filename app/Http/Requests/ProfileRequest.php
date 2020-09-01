<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return 
        [
            'name'              => 'required',
            'email'             => 'required|email|unique:admins,email,'.$this->id,
            'password'          => 'nullable|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return
        [
            'name.required'                 => 'هذا الحقل مطلوب',
            'email.required'                => 'هذا الحقل مطلوبا',
            'email.email'                   => 'هذا الحقل لابد ان يكون من نوع ايميل',
            'password.confirmed'            => 'هذا الحقل غير مطابق الباسورد',
            'password.min'                  => 'هذا الحقل لا يقل عن 6 ارقام او احرف ',
        ];
    }
}
