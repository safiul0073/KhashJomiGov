<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhashJomi extends Model
{
    use HasFactory;

    protected $fillable = [
        'upazila_id',
        'union_id',
        'mowja',
        'j_l_no',
        'khotian_no',
        'dag_nos',
        'quantitys',
    ];

    public function upazila()
    {
        return $this->belongsTo(UpaZila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function getDagNosAttribute($value)
    {
        return json_decode($value);
    }

    public function setDagNosAttribute($value)
    {
        $this->attributes['dag_nos'] = json_encode($value);
    }

    public function getQuantitysAttribute($value)
    {
        return json_decode($value);
    }

    public function setQuantitysAttribute($value)
    {
        $this->attributes['quantitys'] = json_encode($value);
    }

    
}
