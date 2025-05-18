<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminauthcontroller extends Controller
{
    public function adminlogin(){
        return view('backend.admin-login');
    }
}
