<?php
namespace App\Services;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class  DataTableService {
    public static function make($query, Request $request)
    {

        return DataTables::of($query)
                ->editColumns('name', function ($query) {
                    return $query->main_name;
                })
                ->editColumns('father', function ($query) {
                    return $query->main_fathers_name;
                })
                ->editColumns('address', function ($query) {
                    return $query->main_village.', '.$query->union->name.', '. $query->upa_zila->name;
                })
                ->editColumns('avater', function ($query) {
                    return '<img src="'.$query->avater.'" class="img-fluid" align="center" >';
                })
                ->editColumns('action', function ($query) {
                    $acction = '<div class="d-flex flex-column">';
                    $acction .= '<a href="'.route('show.app', $query->id).'" class="btn btn-sm btn-outline-success text-black"><i class="far fa-eye"></i></a>';
                    $acction .= '<a href="'.route('edit.app', $query->id).'" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>';
                    $acction .= '<button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteApplication('.$query->id.')"><i class="fas fa-ban"></i></button>';
                    $acction .= '<form id="delete-form-'.$query->id.'" action="'.route('application.destroy',$query->id).'" method="POST" style="display: none;" >';
                    $acction .= '@csrf';
                    $acction .= '@method("DELETE")';
                    $acction .= '</form></div>';

                })
                ->rawColumns(['avater', 'action'])
                ->make(true);
    }
}
