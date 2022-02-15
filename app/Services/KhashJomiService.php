<?php
namespace App\Services;

use App\Models\KhashJomi;
use Illuminate\Support\Facades\Request;

class  KhashJomiService {

    public static function insertKhashJomi (Request $request) {
        $khashJomi = new KhashJomi();
        $khashJomi->khash_jomi_name = 'Khash Jomi Name';
        $khashJomi->khash_jomi_address = 'Khash Jomi Address';
        $khashJomi->upa_zila_id = 1;
        $khashJomi->save();
    }

    
}
