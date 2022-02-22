<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BondobostoRequest;
use App\Models\BondobostoApp;
use App\Models\Union;
use App\Models\UpaZila;
use App\Services\FileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $khashJomis = $union->khash_jomis ? $union->khash_jomis : [];
        return view('frontend.application.create', compact('upa_zila','union', 'khashJomis'));
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
        DB::beginTransaction();
        try {
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
                'mowjar_name_somuho' => implode(',',$request->mowjar_name_somuho),
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
            if ($request->dorkhastokarir_nodi_vangon_biborn_files) {

                    $file_name = $service->fileExequtes($request->file('dorkhastokarir_nodi_vangon_biborn_files'));
                    $b->metas()->create(['name' => 'dorkhastokarir_nodi_vangon_biborn_files',
                                       'content' => $file_name]);
                }
            if ($request->dorkhastokarir_shohidorpongo_person_biboron_files) {
                    $file_name = $service->fileExequtes($request->file('dorkhastokarir_shohidorpongo_person_biboron_files'));
                    $b->metas()->create(['name' => 'dorkhastokarir_shohidorpongo_person_biboron_files',
                                       'content' => $file_name]);
                }
            if ($request->dorkhastokarir_khash_jomir_biboron_files) {
                    $file_name = $service->fileExequtes($request->file('dorkhastokarir_khash_jomir_biboron_files'));
                    $b->metas()->create(['name' => 'dorkhastokarir_khash_jomir_biboron_files',
                                       'content' => $file_name]);
                }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }

        return redirect()->back()->with('success','Successfully Application created!');
    }



    public function update(Request $request, BondobostoApp $application)
    {

        $service = new FileService();

        DB::beginTransaction();
    try {

       $avater = $service->deleteFile($request,$application->avater,'avater');
       $vumihi_muktijudda_sonod = $service->deleteFile($request,
                                  $application->vumihi_muktijudda_sonod,
                                  'vumihi_muktijudda_sonod');
       $vumihi_commission_sonod = $service->deleteFile($request,
                                  $application->vumihi_commission_sonod,
                                  'vumihi_commission_sonod');
       $vumihin_others_sonod = $service->deleteFile($request,
                                  $application->vumihin_others_sonod,
                                  'vumihin_others_sonod');
       $dorkhastokarir_tipshoi = $service->deleteFile($request,
                                  $application->dorkhastokarir_tipshoi,
                                  'dorkhastokarir_tipshoi');
       $shonaktokarir_tipshoi = $service->deleteFile($request,
                                  $application->shonaktokarir_tipshoi,
                                  'shonaktokarir_tipshoi');
       $vumi_rajossho_office_shakkor = $service->deleteFile($request,
                                  $application->vumi_rajossho_office_shakkor,
                                  'vumi_rajossho_office_shakkor');
       $rajossho_kormokorter_sakkhor = $service->deleteFile($request,
                                  $application->rajossho_kormokorter_sakkhor,
                                  'rajossho_kormokorter_sakkhor');

        $attributes = [
            'app_class' => $service->dataExecute($request->app_class),
            'avater' => $avater,
            'main_name' => $request->main_name,
            'main_age' => $request->main_age,
            'main_fathers_name' => $request->main_fathers_name,
            'main_fathers_mortal' => $request->main_fathers_mortal,
            'main_village' => $request->main_village,
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
            'acland_mowja_name' => $request->acland_mowja_name,
            'acland_jl_no' => $request->acland_jl_no,
            'acland_khotian_numbers' => $request->acland_khotian_numbers,
            'acland_dag_no' => $request->acland_dag_no,
            'acland_jomit_size' => $request->acland_jomit_size,
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
        if (!$b) return throw new Exception('Error Processing Request', 500);
    //     if ($request->dorkhastokarir_nodi_vangon_biborn_files) {

    //         $file_name = $service->fileExequtes($request->file('dorkhastokarir_nodi_vangon_biborn_files'));
    //         $application->metas()->where('name', 'dorkhastokarir_nodi_vangon_biborn_files')->update(['name' => 'dorkhastokarir_nodi_vangon_biborn_files',
    //                            'content' => $file_name]);
    //     }
    // if ($request->dorkhastokarir_shohidorpongo_person_biboron_files) {
    //         $file_name = $service->fileExequtes($request->file('dorkhastokarir_shohidorpongo_person_biboron_files'));
    //         $application->metas()->create(['name' => 'dorkhastokarir_shohidorpongo_person_biboron_files',
    //                            'content' => $file_name]);
    //     }
    // if ($request->dorkhastokarir_khash_jomir_biboron_files) {
    //         $file_name = $service->fileExequtes($request->file('dorkhastokarir_khash_jomir_biboron_files'));
    //         $application->metas()->create(['name' => 'dorkhastokarir_khash_jomir_biboron_files',
    //                            'content' => $file_name]);
    //     }
        DB::commit();
    } catch (\Exception $ex) {
        DB::rollback();
        return redirect()->back()->with('error',$ex->getMessage());
    }
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

        if ($b->avater && File::exists($b->avater)) {
            File::delete($b->avater);
        }
        if ($b->vumihi_muktijudda_sonod && File::exists($b->vumihi_muktijudda_sonod)) {
            File::delete($b->vumihi_muktijudda_sonod);
        }
        if ($b->vumihi_commission_sonod && File::exists($b->vumihi_commission_sonod)) {
            File::delete($b->vumihi_commission_sonod);
        }
        if ($b->vumihin_others_sonod && File::exists($b->vumihin_others_sonod)) {
            File::delete($b->vumihin_others_sonod);
        }
        if ($b->vumi_rajossho_office_shakkor && File::exists($b->vumi_rajossho_office_shakkor)) {
            File::delete($b->vumi_rajossho_office_shakkor);
        }
        if ($b->rajossho_kormokorter_sakkhor && File::exists($b->rajossho_kormokorter_sakkhor)) {
            File::delete($b->rajossho_kormokorter_sakkhor);
        }
        if ($b->dorkhastokarir_tipshoi && File::exists($b->dorkhastokarir_tipshoi)) {
            File::delete($b->dorkhastokarir_tipshoi);
        }
        if ($b->shonaktokarir_tipshoi && File::exists($b->shonaktokarir_tipshoi)) {
            File::delete($b->shonaktokarir_tipshoi);
        }

        if ($b->metas()) {
            $meta = $b->metas()->get();
            foreach ($meta as $m) {
                if ($m->name == 'dorkhastokarir_nodi_vangon_biborn_files') {
                    foreach(explode(',', $m->content) as $file) {
                        if (File::exists($file)) {
                            File::delete($file);
                        }
                    }
                }
                if ($m->name == 'dorkhastokarir_shohidorpongo_person_biboron_files') {
                    foreach(explode(',', $m->content) as $file) {
                        if (File::exists($file)) {
                            File::delete($file);
                        }
                    }
                }
                if ($m->name == 'dorkhastokarir_khash_jomir_biboron_files') {
                    foreach(explode(',', $m->content) as $file) {
                        if (File::exists($file)) {
                            File::delete($file);
                        }
                    }
                }
                $m->delete();
            }

        }

        if ($b->app_sends()) {
            foreach ($b->app_sends() as $item) {
                if ($item->file && File::exists($item->file)) {
                    File::delete($item->file);
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