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
    public function addExpense(){
        $settings = Settings::find(1);
        return view('Expenses.addExpense')->with('settings',$settings);
    }
    public function allExpenses(){
        $settings = Settings::find(1);
        return view('Expenses.allExpenses')->with('settings',$settings);
    }
    public function addPayment(){
        $settings = Settings::find(1);
        return view('Payments.addPayment')->with('settings',$settings);
    }
    public function allPayments(){
        $settings = Settings::find(1);
        return view('Payments.allPayments')->with('settings',$settings);
    }
    public function addProject(){
        $settings = Settings::find(1);
        return view('ProjectsAndServices.addProject')->with('settings',$settings);
    }
    public function addService(){
        $settings = Settings::find(1);
        return view('ProjectsAndServices.addService')->with('settings',$settings);
    }
    public function allProjectsAndServices(){
        $settings = Settings::find(1);
        return view('ProjectsAndServices.allProjectsAndServices')->with('settings',$settings);
    }
    public function projectDetails(){
        $settings = Settings::find(1);
        return view('ProjectsAndServices.projectDetails')->with('settings',$settings);
    }
    public function serviceDetails(){
        $settings = Settings::find(1);
        return view('ProjectsAndServices.serviceDetails')->with('settings',$settings);
    }
}
