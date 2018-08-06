<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        return view('dashboard.index');
    }
    public function addExpense(){
        return view('Expenses.addExpense');
    }
    public function allExpenses(){
        return view('Expenses.allExpenses');
    }
    public function addPayment(){
        return view('Payments.addPayment');
    }
    public function allPayments(){
        return view('Payments.allPayments');
    }
    public function addProject(){
        return view('ProjectsAndServices.addProject');
    }
    public function addService(){
        return view('ProjectsAndServices.addService');
    }
    public function allProjectsAndServices(){
        return view('ProjectsAndServices.allProjectsAndServices');
    }
    public function projectDetails(){
        return view('ProjectsAndServices.projectDetails');
    }
    public function serviceDetails(){
        return view('ProjectsAndServices.serviceDetails');
    }
}
