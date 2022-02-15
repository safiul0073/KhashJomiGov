<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BondobostoRequest extends FormRequest
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
            'app_class.required' => 'দরখাস্তকারী কোন শ্রেণীর ভুমিহীন সিলেক্ট করুন',
            'avater.required' => 'ছবি আপলোড দেন',
            'main_name.required' => 'নাম লিখুন',
            'main_age.required' => 'বয়স লিখুন',
            'main_fathers_name.required' => 'বাবার নাম লিখুন',
            'main_f_or_m_name.required' => 'নাম লিখুন',
            'main_f_or_m_age.required' => 'বয়স লিখুন',
            'dorkhastokarir_barir_biboron.required' => ' দরখাস্ত কারীর নিজের বসত বাড়ির বিবরণ লিখুন',
            'main_fathers_mortal.required' => ' দরখাস্তকারীর পিতা/স্বামীর জীবিত/মৃত সিলেক্ট করুন',
            'vumihi_commission_sonod.required' => 'ইউনিয়ন চেয়ারম্যান/পৌর চেয়ারমেন/ওয়ার্ড কমিশনের সনদ আপলোড করুন',
            'dorkhastokarir_tipshoi.required' => 'টিপ সই আপলোড দেন',
            'shonaktokarir_tipshoi.required' => 'টিপ সই আপলোড দেন',
            'shopoth_namar_baktir_name.required' => 'নাম লিখুন',
            'shopoth_nama_parents_name.required' => 'নাম লিখুন',
        ];
    }

    public function rules()
    {
        return [
            'app_class' => 'required',
            'avater' => 'required|max:10000|mimes:jpeg,jpg,png',
            'main_name' => 'required',
            'main_age' => 'required | numeric',
            'main_fathers_name' => 'required',
            'main_fathers_mortal' => 'required',
            'main_village' => 'required',
            'main_zila' => 'required',
            'main_f_or_m_name' => 'required',
            'main_f_or_m_age' => 'required',
            'name.*.name' => 'nullable|string',
            'age.*.age' => 'nullable| numeric',
            'relation.*.relation' => 'nullable|string',
            'whatdo.*.whatdo' => 'nullable|string',
            'comment.*.comment' => 'nullable|string',
            'dorkhastokarir_barir_biboron' => 'required| string',
            'dorkhastokarir_present_biboron' => 'nullable| string',
            'dorkhastokarir_khas_jomir_biboron' => 'nullable | string',
            'dorkhastokarir_khas_dakhil_biboron' => 'nullable | string',
            'dorkhastokarir_nodi_vangon_biborn' => 'nullable| string',
            'dorkhastokarir_shohidorpongo_person_biboron' => 'nullable| string',
            'vumihi_muktijudda_sonod' => 'nullable|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
            'vumihi_commission_sonod' => 'required|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
            'vumihin_others_sonod.*' => 'nullable|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
            'dorkhastokarir_khash_jomir_biboron'=> 'nullable|string',
            'khashjomipower_karon' => 'nullable|string',
            'mowjar_name_somuho' => 'nullable|string',
            'duijon_baktir_nam_tikana' => 'nullable|string',
            'shopoth_namar_baktir_name' => 'required|string',
            'shopoth_nama_parents_name' => 'required|string',
            'dorkhastokarir_tipshoi' => 'required|mimes:jpeg,jpg,png| max:2400',
            'shonaktokarir_tipshoi' => 'required|mimes:jpeg,jpg,png| max:2400',
            'poron_kari_name' => 'required|string',
            'puron_karir_girdian' => 'required|string',
            'puron_karir_podobi' => 'nullable|string',
            'purun_karir_address' => 'nullable|string',
            'dorkhasto_praptir_tarik' => 'nullable|string',
            'praptir_kromic_no' => 'nullable|string',
            'praptir_roshid_kromik_no' => 'nullable|string',
            'praptir_somoy' => 'nullable|string',
            'vumi_rajossho_office_shakkor' => 'nullable|mimes:jpeg,jpg,png|max:2400',
            'rajossho_kormokorter_sakkhor' => 'nullable|mimes:jpeg,jpg,png|max:2400',
        ];
    }
}
