<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseType;
use App\Settings;
use App\Client;
use App\Bank;
use App\Percentage;
use App\TransferMethod;
use App\Project;
use App\Service;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::find(1);
        return view('Expenses.allExpenses')->with('settings',$settings);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::find(1);
        $expenseTypes = ExpenseType::all();
        $clients = Client::all();
        $banks = Bank::all();
        $transferMethods = TransferMethod::all();
        $percentages = Percentage::all();
        return view('Expenses.addExpense')->with([
            'settings' => $settings,
            'expenseTypes' => $expenseTypes,
            'clients' => $clients,
            'banks' => $banks,
            'transferMethods' => $transferMethods,
            'percentages' => $percentages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    public function updateProjectServiceId(Request $request){
        if($request->ajax()){

            $typeId = $request->input('type');
            $expenseType = ExpenseType::find($typeId);
            $type = $expenseType->name;
            if($type == 'خدمة'){
                $data = Service::all();
            }elseif($type == 'مشروع'){
                $data = Project::all();
            }else{
                $projects = Project::all();
                $services = Service::all();
                $data = array_merge($projects->toArray(), $services->toArray());
            }
            return $data;
        }
    }
}
