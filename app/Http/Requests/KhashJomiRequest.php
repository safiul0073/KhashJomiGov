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
            'union_id.required' => 'ইউনিয়ন নির্বাচন করুন',
            'mowja.required' => 'মোজা লিখুন',
            'j_l_no.required' => 'জে এল নাম্বার লিখুন',
            'khotian_no.required' => 'খতিয়ান নাম্বার লিখুন',
            'dag_nos.*required' => 'দাগ নাম্বার লিখুন সাথে জায়গা লিখুন',
        ];
    }
    public function rules()
    {
        return [
            'upa_zila_id'=>'required|exists:upa_zilas,id',
            'union_id'=>'required|exists:unions,id',
            'mowja'=>'required|string|max:255',
            'j_l_no'=>'required|string|max:255',
            'khotian_no'=>'required|string|max:255',
            'dag_nos.*'=>'required|string|max:255',
            'quantitys.*'=>'required|string|max:255',
        ];
    }
}
