<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSend extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bondobosto_app () {
        return $this->belongsTo(BondobostoApp::class, 'bondobosto_app_id', 'id');
    }

    public function role () {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
