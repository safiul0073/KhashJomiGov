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
            'app_class.required' => 'দরখাস্তকারী কোন শ্রেণীর ভুমিহীন field is required.',
            'avater.required' => 'The Image field is required.',
            'main_name.required' => 'The Name field is required.',
            'main_age.required' => 'The Age field is required.',
            'main_fathers_name.required' => 'The Fathers Name field is required.',
            'main_f_or_m_name.required' => 'The Name field is required.',
            'main_f_or_m_age.required' => 'The Age field is required.',
            'dorkhastokarir_barir_biboron.required' => ' দরখাস্ত কারীর নিজের বসত বাড়ির বিবরণ field is required.',
            'vumihi_muktijudda_sonod.required' => 'যথাযথ কর্তৃপক্ষ কর্তৃক প্রদত্ত মুক্তিযুদ্দা সনদ field is required.',
            'vumihi_commission_sonod.required' => 'ইউনিয়ন চেয়ারম্যান/পৌর চেয়ারমেন/ওয়ার্ড কমিশনের সনদ field is required.',

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
            'main_union' => 'required',
            'main_upzila' => 'required',
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
            'dorkhastokarir_shohidorpongo_person_biboron' => 'required| string',
            'vumihi_muktijudda_sonod' => 'required|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
            'vumihi_commission_sonod' => 'required|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
            'vumihin_others_sonod.*' => 'required|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png',
        ];
    }
}
