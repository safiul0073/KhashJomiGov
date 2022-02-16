<?php
namespace App\Services;

use App\Http\Requests\KhashJomiRequest;
use App\Models\KhashJomi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class  KhashJomiService {

    public function insertKhashJomi (KhashJomiRequest $request) {

        $user = Auth::user();
        $khashJomi = new KhashJomi();
        $khashJomi->upa_zila_id = $user->upa_zila_id;
        $khashJomi->union_id = $request->union_id;
        $khashJomi->mowja = $request->mowja;
        $khashJomi->j_l_no = $request->j_l_no;
        $khashJomi->khotian_no = $request->khotian_no;
        $khashJomi->dag_nos = $this->arrayString($request->dag_nos);
        $khashJomi->quantitys = $this->arrayString($request->quantitys);
        $khashJomi->save();
    }

    private function arrayString ($array) {
        $array_values = [];
        foreach ($array as $key => $value) {

            $array_values[]= $value;
        }
        return implode(',', $array_values);
    }


    public static function make($query)
    {

        return DataTables::of($query)
                ->editColumn('name', function ($row) {
                    return $row->main_name;
                })
                ->editColumn('father', function ($row) {
                    return $row->main_fathers_name;
                })
                ->editColumn('address', function ($row) {
                    return $row->main_village.', '.$row->union->name.', '. $row->upa_zila->name;
                })
                ->editColumn('avater', function ($row) {
                    return '<img src="'.$row->avater.'" class="img-fluid" align="center" >';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge badge-pill badge-warning">শুরু করেনি</span>';
                    }else if ($row->status == 2) {
                        $running = '<span class="badge badge-pill badge-primary">চলমান</span>';
                        $running .= '<a href="'.route('running.app', $row->id).'" class="btn btn-sm btn-primary">বিস্তারিত</a>';
                        return $running;
                    }else {
                        return '<span class="badge badge-pill badge-success">সম্পূর্ণ</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $acction = '<div class="d-flex flex-column">';
                    $acction .= '<a href="'.route('show.app', $row->id).'" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>';
                    $acction .= '<a href="'.route('edit.app', $row->id).'" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>';
                    $acction .= '<button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteApplication('.$row->id.')"><i class="fas fa-ban"></i></button>';
                    $acction .= '<form id="delete-form-'.$row->id.'" action="'.route('application.destroy',$row->id).'" method="POST" style="display: none;" >';
                    $acction .= '@csrf';
                    $acction .= '@method("DELETE")';
                    $acction .= '</form></div>';
                    return $acction;

                })
                ->rawColumns(['status','avater', 'action'])
                ->make(true);
    }

}
