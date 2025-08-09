<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSettings()
    {
       $settings = Setting::first();
      return view('backend.settings.showsettings', compact('settings'));
    }
}
