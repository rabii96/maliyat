<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $settings = Settings::find(1);
        return view('dashboard.index')->with('settings',$settings);
    }
}
