<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KhashJomiRequest;
use App\Models\KhashJomi;
use App\Services\KhashJomiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhashJomiController extends Controller
{
    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $tab = 1;
        $page = 'table';
        $khashJomi = null;
        if ($request->tab) {
            $tab = $request->tab;
        }

        if ($request->page) {
            $page = $request->page;
            if ($page == 'edit') {
                $khashJomi = KhashJomi::find($request->id);
            }
        }
        $upa_zila_id = $user->upa_zila_id;
        $unions = $user->upazila->unions;
        $khashJomis = $user->upazila->khash_jomis()->where('union_id', $tab)->get();
        return view('admin.contents.acland.khash_jomi.index', compact('khashJomis', 'unions','upa_zila_id','tab','page', 'khashJomi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhashJomiRequest $request, KhashJomiService $khashJomiService)
    {
        $khashJomiService->insertKhashJomi($request);
        return redirect()->back()->with('success', 'জমি সফলভাবে যুক্ত করা হয়েছে');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Http\Response
     */
    public function show(KhashJomi $khashJomi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Http\Response
     */
    public function edit(KhashJomi $khashJomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KhashJomi $khashJomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhashJomi $khashJomi)
    {
        $khashJomi->delete();
        return redirect()->back()->with('success', 'জমি সফলভাবে মুছে ফেলা হয়েছে');
    }
}