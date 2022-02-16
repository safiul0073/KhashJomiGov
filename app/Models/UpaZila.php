<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpaZila extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function unions () {
        return $this->hasMany(Union::class);
    }

    public function bondobosto_apps () {
        return $this->hasMany(BondobostoApp::class);
    }

    public function khash_jomis () {
        return $this->hasMany(KhashJomi::class);
    }

    public function users () {
        return $this->hasMany(User::class, 'upa_zila_id');
    }

    public static function generateUpaZila() {
        $upaZilas = [
            [
                'name' => 'লালমনিরহাট সদর'
            ],
            [
                'name' => 'আদিতমারী'
            ],
            [
                'name' => 'কালীগঞ্জ'
            ],
            [
                'name' => 'হাতীবান্ধা'
            ],
            [
                'name' => 'পাটগ্রাম'
            ],
    ];

        foreach($upaZilas as $upa) {
            self::create($upa);
        }
    }
}
