<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviusUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'role_id', 'app_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function appSend()
    {
        return $this->belongsTo(AppSend::class);
    }

    public function explodedData () {

        return explode(',', $this->app_id);
    }
}
