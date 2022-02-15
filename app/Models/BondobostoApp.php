<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondobostoApp extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function union () {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }

    public function upa_zila () {
        return $this->belongsTo(UpaZila::class, 'upa_zila_id', 'id');
    }

    // BondobostoApp has many AppSend
    public function app_sends () {
        return $this->hasMany(AppSend::class, 'bondobosto_app_id', 'id');
    }

    public function explodedData ($attribute) {

        return explode(',', $this->$attribute);
    }

    public function familyMembers() {
        $familys = array();

        foreach($this->explodedData('shodosso_names') as $item) {
            $ar1[] = [
                'name' => $item??'',
            ];
        }
        foreach($this->explodedData('shodosso_ages') as $item) {
            $ar2[] = [
                'age' => $item??'',
            ];
        }
        foreach($this->explodedData('shodosso_relations') as $item) {
            $ar3[] = [
                'relation' => $item??'',
            ];
        }
        foreach($this->explodedData('shodosso_whatdos') as $item) {
            $ar4[] = [
                'whatdos' => $item??'',
            ];
        }
        foreach($this->explodedData('shodosso_comments') as $item) {
            $ar5[] = [
                'comment' => $item??'',
            ];
        }
        for($i=0; $i<count($ar1); $i++) {
            $familys[] = [
                'name' => trim($ar1[$i]['name'])??'',
                'age' => trim($ar2[$i]['age'])??'',
                'relation' => trim($ar3[$i]['relation'])??'',
                'whatdos' => trim($ar4[$i]['whatdos'])??'',
                'comment' => trim($ar5[$i]['comment'])??'',
            ];
        }

        return $familys;

    }
}
