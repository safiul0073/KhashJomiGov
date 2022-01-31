<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BondobostoRequest;
use App\Models\BondobostoApp;
use App\Models\Union;
use App\Models\UpaZila;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BondobostoAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $upa_zila = UpaZila::find($request->upa_zila_id);
        $union = Union::find($request->union_id);

        return view('frontend.application.create', compact('upa_zila','union'));
    }

    public function getUnion ($id) {

        $hell = '';
        $unions = Union::where('upa_zila_id', $id)->get();
        $hell .= '<option ' .'selected' .' disabled'.' >'.'ইউনিয়ন নির্বাচন'.'</option>';
        foreach($unions as $un) {

            $hell .= '<option value="'.$un->id.'">'.$un->name.'</option>';
        }
        $htmls = '';
        $htmls = '<select name="main_union" class="form-control ml-2">'.$hell.'</select>';
        echo $htmls;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BondobostoRequest $request, FileService $service)
    {
            $attributes = [
                'upa_zila_id' => $request->upa_zila_id,
                'union_id' => $request->union_id,
                'app_class' => $service->dataExecute($request->app_class),
                'avater' => $service->fileExequtes($request->file('avater')),
                'main_name' => $request->main_name,
                'main_age' => $request->main_age,
                'main_fathers_name' => $request->main_fathers_name,
                'main_fathers_mortal' => $request->main_fathers_mortal,
                'main_village' => $request->main_village,
                'main_union_id' => $request->main_union,
                'main_upzila_id' => $request->main_upzila,
                'main_zila' => $request->main_zila,
                'main_f_or_m_name' => $request->main_f_or_m_name,
                'main_f_or_m_age' => $request->main_f_or_m_age,
                'shodosso_names' => $service->dataExecute($request->name),
                'shodosso_ages' => $service->dataExecute($request->age),
                'shodosso_relations' => $service->dataExecute($request->relation),
                'shodosso_whatdos' => $service->dataExecute($request->whatdo),
                'shodosso_comments' => $service->dataExecute($request->comment),
                'dorkhastokarir_barir_biboron' => $request->dorkhastokarir_barir_biboron,
                'dorkhastokarir_present_biboron' => $request->dorkhastokarir_present_biboron,
                'dorkhastokarir_khas_jomir_biboron' => $request->dorkhastokarir_khas_jomir_biboron,
                'dorkhastokarir_khas_dakhil_biboron' => $request->dorkhastokarir_khas_dakhil_biboron,
                'dorkhastokarir_nodi_vangon_biborn' => $request->dorkhastokarir_nodi_vangon_biborn,
                'dorkhastokarir_shohidorpongo_person_biboron' => $request->dorkhastokarir_shohidorpongo_person_biboron,
                'vumihi_muktijudda_sonod' => $request->hasFile('vumihi_muktijudda_sonod')? $service->fileExequtes($request->file('vumihi_muktijudda_sonod')): null,
                'vumihi_commission_sonod' => $request->hasFile('vumihi_commission_sonod')?$service->fileExequtes($request->file('vumihi_commission_sonod')) : null,
                'vumihin_others_sonod' => $request->hasFile('vumihin_others_sonod')? $service->fileExequtes($request->file('vumihin_others_sonod')): null,
                'dorkhastokarir_khash_jomir_biboron' => $request->dorkhastokarir_khash_jomir_biboron,
                'khashjomipower_karon' => $request->khashjomipower_karon,
                'mowjar_name_somuho' => $request->mowjar_name_somuho,
                'duijon_baktir_nam_tikana' => $request->duijon_baktir_nam_tikana,
                'shopoth_namar_baktir_name' => $request->shopoth_namar_baktir_name,
                'shopoth_nama_parents_name' => $request->shopoth_nama_parents_name,
                'dorkhastokarir_tipshoi' => $request->hasFile('dorkhastokarir_tipshoi')? $service->fileExequtes($request->file('dorkhastokarir_tipshoi')): null,
                'shonaktokarir_tipshoi' => $request->hasFile('shonaktokarir_tipshoi')? $service->fileExequtes($request->file('shonaktokarir_tipshoi')): null,
                'poron_kari_name' => $request->poron_kari_name,
                'puron_karir_girdian' => $request->puron_karir_girdian,
                'puron_karir_podobi' => $request->puron_karir_podobi,
                'purun_karir_address' => $request->purun_karir_address,
                'dorkhasto_praptir_tarik' => $request->dorkhasto_praptir_tarik,
                'praptir_kromic_no' => $request->praptir_kromic_no,
                'praptir_roshid_kromik_no' => $request->praptir_roshid_kromik_no,
                'praptir_somoy' => $request->praptir_somoy,
                'vumi_rajossho_office_shakkor' => $request->vumi_rajossho_office_shakkor,
                'rajossho_kormokorter_sakkhor' => $request->rajossho_kormokorter_sakkhor,
            ];
            $b = BondobostoApp::create($attributes);
            if (!$b) return redirect()->back()->with('error','Unable to create!');
        return redirect()->back()->with('success','Successfully Application created!');
    }




    public function edit(BondobostoApp $bondobostoApp)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BondobostoApp  $bondobostoApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BondobostoApp $application)
    {

        $service = new FileService();

       $avater = $service->deleteFile($request,$application->avater,$request->file('avater'));

        if ($request->hasFile('vumihi_muktijudda_sonod')) {
            if (file_exists(public_path($application->vumihi_muktijudda_sonod))) {
                unlink(public_path($application->vumihi_muktijudda_sonod));
            }
            $vumihi_muktijudda_sonod = $service->fileExequtes($request->file('vumihi_muktijudda_sonod'));
        } else {
            $vumihi_muktijudda_sonod = $application->vumihi_muktijudda_sonod;
        }

        if ($request->hasFile('vumihi_commission_sonod')) {
            if (file_exists(public_path($application->vumihi_commission_sonod))) {
                unlink(public_path($application->vumihi_commission_sonod));
            }
            $vumihi_commission_sonod = $service->fileExequtes($request->file('vumihi_commission_sonod'));
        } else {
            $vumihi_commission_sonod = $application->vumihi_commission_sonod;
        }

        if ($request->hasFile('vumihin_others_sonod')) {
            if (file_exists(public_path($application->vumihin_others_sonod))) {
                unlink(public_path($application->vumihin_others_sonod));
            }
            $vumihin_others_sonod = $service->fileExequtes($request->file('vumihin_others_sonod'));
        } else {
            $vumihin_others_sonod = $application->vumihin_others_sonod;
        }
        if ($request->hasFile('dorkhastokarir_tipshoi')) {
            if (file_exists(public_path($application->dorkhastokarir_tipshoi))) {
                unlink(public_path($application->dorkhastokarir_tipshoi));
            }
            $dorkhastokarir_tipshoi = $service->fileExequtes($request->file('dorkhastokarir_tipshoi'));
        } else {
            $dorkhastokarir_tipshoi = $application->dorkhastokarir_tipshoi;
        }

        if ($request->hasFile('shonaktokarir_tipshoi')) {
            if (file_exists(public_path($application->shonaktokarir_tipshoi))) {
                unlink(public_path($application->shonaktokarir_tipshoi));
            }
            $shonaktokarir_tipshoi = $service->fileExequtes($request->file('shonaktokarir_tipshoi'));
        } else {
            $shonaktokarir_tipshoi = $application->shonaktokarir_tipshoi;
        }

        if ($request->hasFile('vumi_rajossho_office_shakkor')) {
            if (file_exists(public_path($application->vumi_rajossho_office_shakkor))) {
                unlink(public_path($application->vumi_rajossho_office_shakkor));
            }
            $vumi_rajossho_office_shakkor = $service->fileExequtes($request->file('vumi_rajossho_office_shakkor'));
        } else {
            $vumi_rajossho_office_shakkor = $application->vumi_rajossho_office_shakkor;
        }

        if ($request->hasFile('rajossho_kormokorter_sakkhor')) {
            if (file_exists(public_path($application->rajossho_kormokorter_sakkhor))) {
                unlink(public_path($application->rajossho_kormokorter_sakkhor));
            }
            $rajossho_kormokorter_sakkhor = $service->fileExequtes($request->file('rajossho_kormokorter_sakkhor'));
        } else {
            $rajossho_kormokorter_sakkhor = $application->rajossho_kormokorter_sakkhor;
        }

        $attributes = [
            'app_class' => $service->dataExecute($request->app_class),
            'avater' => $avater,
            'main_name' => $request->main_name,
            'main_age' => $request->main_age,
            'main_fathers_name' => $request->main_fathers_name,
            'main_fathers_mortal' => $request->main_fathers_mortal,
            'main_village' => $request->main_village,
            'main_union_id' => $request->main_union,
            'main_upzila_id' => $request->main_upzila,
            'main_zila' => $request->main_zila,
            'main_f_or_m_name' => $request->main_f_or_m_name,
            'main_f_or_m_age' => $request->main_f_or_m_age,
            'shodosso_names' => $service->dataExecute($request->name),
            'shodosso_ages' => $service->dataExecute($request->age),
            'shodosso_relations' => $service->dataExecute($request->relation),
            'shodosso_whatdos' => $service->dataExecute($request->whatdo),
            'shodosso_comments' => $service->dataExecute($request->comment),
            'dorkhastokarir_barir_biboron' => $request->dorkhastokarir_barir_biboron,
            'dorkhastokarir_present_biboron' => $request->dorkhastokarir_present_biboron,
            'dorkhastokarir_khas_jomir_biboron' => $request->dorkhastokarir_khas_jomir_biboron,
            'dorkhastokarir_khas_dakhil_biboron' => $request->dorkhastokarir_khas_dakhil_biboron,
            'dorkhastokarir_nodi_vangon_biborn' => $request->dorkhastokarir_nodi_vangon_biborn,
            'dorkhastokarir_shohidorpongo_person_biboron' => $request->dorkhastokarir_shohidorpongo_person_biboron,
            'vumihi_muktijudda_sonod' => $vumihi_muktijudda_sonod,
            'vumihi_commission_sonod' => $vumihi_commission_sonod,
            'vumihin_others_sonod' => $vumihin_others_sonod,
            'dorkhastokarir_khash_jomir_biboron' => $request->dorkhastokarir_khash_jomir_biboron,
            'khashjomipower_karon' => $request->khashjomipower_karon,
            'mowjar_name_somuho' => $request->mowjar_name_somuho,
            'duijon_baktir_nam_tikana' => $request->duijon_baktir_nam_tikana,
            'shopoth_namar_baktir_name' => $request->shopoth_namar_baktir_name,
            'shopoth_nama_parents_name' => $request->shopoth_nama_parents_name,
            'dorkhastokarir_tipshoi' => $dorkhastokarir_tipshoi,
            'shonaktokarir_tipshoi' => $shonaktokarir_tipshoi,
            'poron_kari_name' => $request->poron_kari_name,
            'puron_karir_girdian' => $request->puron_karir_girdian,
            'puron_karir_podobi' => $request->puron_karir_podobi,
            'purun_karir_address' => $request->purun_karir_address,
            'dorkhasto_praptir_tarik' => $request->dorkhasto_praptir_tarik,
            'praptir_kromic_no' => $request->praptir_kromic_no,
            'praptir_roshid_kromik_no' => $request->praptir_roshid_kromik_no,
            'praptir_somoy' => $request->praptir_somoy,
            'vumi_rajossho_office_shakkor' => $vumi_rajossho_office_shakkor,
            'rajossho_kormokorter_sakkhor' => $rajossho_kormokorter_sakkhor,
        ];
        $b = $application->update($attributes);
        if (!$b) return redirect()->back()->with('error','Unable to update!');
        return redirect()->back()->with('success','Successfully Application updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BondobostoApp  $bondobostoApp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = BondobostoApp::find($id);

        if ($b->avater && File::exists(public_path($b->avater))) {
            File::delete(public_path($b->avater));
        }
        if ($b->vumihi_muktijudda_sonod && File::exists(public_path($b->vumihi_muktijudda_sonod))) {
            File::delete(public_path($b->vumihi_muktijudda_sonod));
        }
        if ($b->vumihi_commission_sonod && File::exists(public_path($b->vumihi_commission_sonod))) {
            File::delete(public_path($b->vumihi_commission_sonod));
        }
        if ($b->vumihin_others_sonod && File::exists(public_path($b->vumihin_others_sonod))) {
            File::delete(public_path($b->vumihin_others_sonod));
        }
        if ($b->vumi_rajossho_office_shakkor && File::exists(public_path($b->vumi_rajossho_office_shakkor))) {
            File::delete(public_path($b->vumi_rajossho_office_shakkor));
        }
        if ($b->rajossho_kormokorter_sakkhor && File::exists(public_path($b->rajossho_kormokorter_sakkhor))) {
            File::delete(public_path($b->rajossho_kormokorter_sakkhor));
        }
        if ($b->dorkhastokarir_tipshoi && File::exists(public_path($b->dorkhastokarir_tipshoi))) {
            File::delete(public_path($b->dorkhastokarir_tipshoi));
        }
        if ($b->shonaktokarir_tipshoi && File::exists(public_path($b->shonaktokarir_tipshoi))) {
            File::delete(public_path($b->shonaktokarir_tipshoi));
        }

        if ($b->app_sends()) {
            foreach ($b->app_sends() as $item) {
                if ($item->file && File::exists(public_path($item->file))) {
                    File::delete(public_path($item->file));
                }
            }
        }
        $b->app_sends()->delete();
        $b->delete();
        if (!$b) return redirect()->back()->with('error','Unable to delete!');
        return redirect()->back()->with('success','Successfully Application deleted!');
    }

    public function docShow (Request $request) {
        $file = $request->file;
        return view('admin.contents.acland.doc', compact('file'));
    }
}
