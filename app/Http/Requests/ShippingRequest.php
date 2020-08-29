<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'id'            => 'required|exists:settings',
            'value'         => 'required',
            'plain_value'   => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return
        [
            'id.required'               => 'هذا الحقل مطلوب',
            'value.required'            => 'هذا الحقل مطلوبا',
            'id.exists'                 => 'هذه القيمة موجودة من قبل',
            'plain_value.numeric'       => 'هذه القيمة يجب ان تحتوي علي ارقام فقط',
        ];
    }
}
