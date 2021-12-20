<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accept()
    {
        return $this->belongsTo(Role::class, 'accept_id', 'id');
    }
    public function send()
    {
        return $this->belongsTo(Role::class, 'send_id', 'id');
    }

    public function bondobosto_app ()
    {
        return $this->belongsTo(BondobostoApp::class, 'bondobosto_app_id', 'id');
    }
}
