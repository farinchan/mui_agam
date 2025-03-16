<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $search = $request->q;
        $event = Event::where('slug', $slug)->where('is_active', 1)->firstOrFail();

        $data = [
            'title' => $event->name,
            'meta_description' => strip_tags($event->description),
            'meta_keywords' => $event->name,
            'favicon' => $event->getThumbnail(),
            'setting_web' => SettingWebsite::first(),
            'event' => $event
        ];

        return view('front.pages.event.detail', $data);
    }
}
