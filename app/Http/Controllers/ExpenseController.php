<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseType;
use App\Settings;
use App\Employee;
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
        $employees = Employee::all();
        $banks = Bank::all();
        $transferMethods = TransferMethod::all();
        $percentages = Percentage::all();
        return view('Expenses.addExpense')->with([
            'settings' => $settings,
            'expenseTypes' => $expenseTypes,
            'employees' => $employees,
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
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'project_service_id' => 'required',
            'employee_id' => 'required',
            'bank_id' => 'required',
            'transfer_method_id' => 'required',
            'value' => 'required',
            'percentage_id' => 'required',
            'value_plus_percentage' => 'required',
            'date' => 'required',
            'attachement' => 'nullable|max:1999'
        ]);
        $expense = new Expense;
        $expense->name = $request->input('name');
        $expense->type = $request->input('type');
       // $expense->project_service_id = $request->input('project_service_id');
        $expense->employee_id = $request->input('employee_id');
        $expense->bank_id = $request->input('bank_id');
        $expense->transfer_method_id = $request->input('transfer_method_id');
        $expense->value = $request->input('value');
       // $expense->percentage_id = $request->input('percentage_id');
        $expense->value_plus_percentage = $request->input('value_plus_percentage');
        //$expense->date = $request->input('date');
        $expense->details = $request->input('details');
        $expense->remarks = $request->input('attachement');
        //$expense->attachement = $request->input('attachement');
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
                $services = Service::all();
                foreach($services as $s){
                    $s->type = 'service';
                }
                $data = $services;
            }elseif($type == 'مشروع'){
                $projects = Project::all();
                foreach($projects as $p){
                    $p->type = 'project';
                }
                $data = $projects;
            }else{
                $projects = Project::all();
                foreach($projects as $p){
                    $p->type = 'project';
                }
                $services = Service::all();
                foreach($services as $s){
                    $s->type = 'service';
                }
                $data = array_merge($projects->toArray(), $services->toArray());
            }
            return $data;
        }
    }
}
