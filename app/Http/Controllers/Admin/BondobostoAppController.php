<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BondobostoRequest;
use App\Models\BondobostoApp;
use App\Models\Union;
use App\Models\UpaZila;
use App\Services\FileService;
use Illuminate\Http\Request;

class BondobostoAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upa_zilas = UpaZila::all();
        return view('admin.contents.applications.index', compact('upa_zilas'));
    }

    public function getUnion ($id) {

        $unions = Union::where('upa_zila_id', $id)->get();
        $hell = '';
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

        if ($request->hasFile('avater')) {
            if (file_exists(public_path($application->avater))) {
                unlink(public_path($application->avater));
            }
            $avater = $service->fileExequtes($request->file('avater'));
        } else {
            $avater = $application->avater;
        }

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
        if (file_exists($b->avater)) {
            unlink($b->avater);
        }
        if (file_exists($b->vumihi_muktijudda_sonod)) {
            unlink($b->vumihi_muktijudda_sonod);
        }
        if (file_exists($b->vumihi_commission_sonod)) {
            unlink($b->vumihi_commission_sonod);
        }
        if (file_exists($b->vumihin_others_sonod)) {
            unlink($b->vumihin_others_sonod);
        }
        if (file_exists($b->vumihin_others_sonod)) {
            unlink($b->vumihin_others_sonod);
        }
        if ($b->app_sends()) {
            foreach ($b->app_sends() as $item) {
                if (file_exists($item->file)) {
                    unlink($item->file);
                }
            }
        }
        $b->app_roles()->delete();
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
