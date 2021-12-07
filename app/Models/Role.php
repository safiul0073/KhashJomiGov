<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function generateRole() {
        $roles = [
            ['name' => 'ac_land'],
            ['name' => 'towshilder'],
            ['name' => 'uno'],
            ['name' => 'dc'],
            ['name' => 'rdc'],
            ['name' => 'rdc_revinew'],
        ];

        foreach ($roles as $role) {
            self::create($role);
        }
    }

}
