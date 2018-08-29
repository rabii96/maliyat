<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Service;
use App\Project;
use App\ExpectedPayment;
use App\RealPayment;
use App\Bank;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $settings = Settings::find(1);
        $services = Service::all();
        $projects = Project::all();
        $expectedPayments = ExpectedPayment::all();
        $banks = Bank::all();
        $paidPayments = ExpectedPayment::where([
            ['state' , '=' , 'Paid']
        ])->get();
        $service_expenses = 0;
        foreach ($services as $s) {
            foreach ($s->expenses as $ex) {
                $service_expenses += $ex->value_plus_percentage ;
            }
        }

        $project_expenses = 0;
        $total_amounts = 0;
        $total_incomes = 0;
        $total_remaining = 0;
        $net_profit = 0;
        $nbWinningProjects = 0;
        $nbLosingProjects = 0;
        $nbEqualProjects = 0;
        foreach ($projects as $p) {
            $project_exp = 0;
            $project_rp = 0;
            foreach ($p->expenses as $ex) {
                $project_expenses += $ex->value_plus_percentage ;
                $project_exp += $ex->value_plus_percentage ;
            }
            foreach ($p->real_payments as $rp){
                $total_incomes += $rp->paid_value;
                $project_rp += $rp->paid_value;
            }
            $project_net = $project_rp - $project_exp;
            if($project_net>0){
                $nbWinningProjects++;
            }else if($project_net<0){
                $nbLosingProjects++;
            }else{
                $nbEqualProjects++;
            }
            $total_amounts += $p->total_cost;
        }

        $total_balance = 0;
        foreach($banks as $b){
            $total_balance += $b->current_balance;
        }

        $total_remaining = $total_amounts - $total_incomes;
        $net_profit = $total_incomes - ($project_expenses + $service_expenses);
        $nbProjects = $projects->count();
        $nbServices = $services->count();
        $nbExpectedPayments = $expectedPayments->count();
        $nbPaidPayments = $paidPayments->count();
        $nbRemainingPayments = $nbExpectedPayments - $nbPaidPayments;
        $nbBanks = $banks->count();


        return view('dashboard.index')->with([
            'settings' => $settings,
            'service_expenses' => $service_expenses,
            'project_expenses' => $project_expenses,
            'total_amounts' => $total_amounts,
            'total_incomes' => $total_incomes,
            'total_remaining' => $total_remaining,
            'net_profit' => $net_profit,
            'nbProjects' => $nbProjects,
            'nbServices' => $nbServices,
            'nbExpectedPayments' => $nbExpectedPayments,
            'nbPaidPayments' => $nbPaidPayments,
            'nbRemainingPayments' => $nbRemainingPayments,
            'nbWinningProjects' => $nbWinningProjects,
            'nbLosingProjects' => $nbLosingProjects,
            'nbEqualProjects' => $nbEqualProjects,
            'nbBanks' => $nbBanks,
            'total_balance' => $total_balance
        ]);
    }
}
