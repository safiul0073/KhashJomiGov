<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function upa_zila() {
        return $this->belongsTo(UpaZila::class);
    }

    public static function generateUnions() {
        $unions = [
            [
                'upa_zila_id' => 1,
                'name' => 'মোগলহাট'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'কুলাঘাট'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'মহেন্দ্রনগর'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'হারাটি'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'খুনিয়াগাছ'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'রাজপুর'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'গোকুন্ডা'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'পঞ্চগ্রাম'
            ],
            [
                'upa_zila_id' => 1,
                'name' => 'বড়বাড়ী'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'পলাশী'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'ভাদাই'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'মহিষখোচা'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'কমলাবাড়ী'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'সাপ্টিবাড়ী'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'সারপুকুর'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'ভেলাবাড়ী'
            ],
            [
                'upa_zila_id' => 2,
                'name' => 'দুর্গাপুর'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'ভোটমারী'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'তুষভাণ্ডার'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'মদাতী'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'দলগ্রাম'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'গোড়ল'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'চন্দ্রপুর'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'চলবলা'
            ],
            [
                'upa_zila_id' => 3,
                'name' => 'কাকিনা'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'বড়খাতা'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'গড্ডিমারী'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'সিংগীমারী'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'টংভাঙ্গা'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'সিন্দুর্না'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'পাটিকাপাড়া'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'ডাউয়াবাড়ী'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'নওদাবাস'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'গোতামারী'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'ভেলাগুড়ী'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'সানিয়াজান'
            ],
            [
                'upa_zila_id' => 4,
                'name' => 'ফকিরপাড়া'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'কুচলিবাড়ী'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'শ্রীরামপুর'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'পাটগ্রাম'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'জগতবেড়'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'জোংড়া'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'বাউড়া'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'দহগ্রাম'
            ],
            [
                'upa_zila_id' => 5,
                'name' => 'বুড়িমারী'
            ],
    ];
        foreach($unions as $un) {
            self::create($un);
        }
    }
}
