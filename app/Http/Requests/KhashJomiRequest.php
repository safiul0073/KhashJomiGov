<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhashJomiRequest extends FormRequest
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
    public function messages () {
        return [
            'mowja.required' => 'মোজা লিখুন',
            'j_l_no.required' => 'জে এল নাম্বার লিখুন',
            'khotian_no.required' => 'খতিয়ান নাম্বার লিখুন',
            'j_l_no.numeric' => 'জে এল নাম্বার লিখুন',
            'khotian_no.numeric' => 'খতিয়ান নাম্বার লিখুন',

        ];
    }
    public function rules()
    {
        return [
            'mowja'=>'required|string|max:255',
            'j_l_no'=>'required|numeric',
            'khotian_no'=>'required|numeric',
        ];
    }
}
