<?php
namespace App\Services;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class  DataTableService {
    public static function make(Request $request)
    {

        $query = BondobostoApp::query()->with(['union', 'upa_zila']);

        // $query->select('id', 'main_name', 'main_fathers_name', 'main_village', 'union_id', 'upa_zila_id', 'status', 'avater');
        if ($request->get('status') && $request->get('status') != "all") {
            if ($request->get('status') == "3") {
                $query->where('status', 0);
            } else {
                $query->where('status', $request->get('status'));
            }
        }
        return DataTables::of($query->get())
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
