<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MuiKecamatan;
use Illuminate\Http\Request;
use App\Models\SettingWebsite;
use Illuminate\Support\Str;

class MuiKecamatanController extends Controller
{
    public function kecamatan($slug)
    {

        $kec = MuiKecamatan::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $kec->name . " | " . $setting_web->name,
            'meta_description' => Str::limit(strip_tags($kec->content), 300),
            'meta_keywords' => $kec->name . ', Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'kec' => $kec
        ];

        return view('front.pages.mui-kecamatan.index', $data);
    }
}
