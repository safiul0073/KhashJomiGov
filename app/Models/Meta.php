<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    function holder()
    {
        return $this->morphTo();
    }
}