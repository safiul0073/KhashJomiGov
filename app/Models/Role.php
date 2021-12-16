<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    // AppSend has many role id
    public function app_sends()
    {
        return $this->hasMany(AppSend::class);
    }
    public static function generateRole() {
        $roles = [
            ['name' => 'সহকারী কমিশনার (ভূমি)'],
            ['name' => 'সার্ভেয়ার'],
            ['name' => 'উপজেলা নির্বাহী অফিসার'],
            ['name' => 'জেলা প্রশাসক, লালমনিরহাট'],
            ['name' => 'অতিরিক্ত জেলা প্রশাসক (রাজস্ব),লালমনিরহাট'],
            ['name' => 'ইউনিয়ন ভূমি সহকারী কর্মকর্তা'],
            ['name' => 'অফিস সহকারী কাম-কম্পিউটার মুদ্রাক্ষরিক'],
        ];

        foreach ($roles as $role) {
            self::create($role);
        }
    }

}
