<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FrontednController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function contactus(){
        return view('frontend.contactus');
    }
}
