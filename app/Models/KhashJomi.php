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

    public function dagWithQuantity()
    {
        foreach(explode(',', $this->dag_nos) as $key => $dag_no) {

            $dag_with_quantity[$key] = [
                'dag_no' => $dag_no,
            ];
        }
        foreach(explode(',', $this->quantitys) as $key => $quantity) {

            $dag_with_quantity[$key]['quantity'] = $quantity;
        }
        return $dag_with_quantity;
    }
}
