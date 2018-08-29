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
use Carbon\Carbon;

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
        $expenses = Expense::all();
        return view('Expenses.allExpenses')->with([
            'settings' => $settings,
            'expenses' => $expenses,
        ]);
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
        $projects = Project::all();
        $services = Service::all();
        return view('Expenses.addExpense')->with([
            'settings' => $settings,
            'expenseTypes' => $expenseTypes,
            'employees' => $employees,
            'banks' => $banks,
            'transferMethods' => $transferMethods,
            'percentages' => $percentages,
            'projects' => $projects,
            'services' => $services
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
        $expense->expense_type_id = $request->input('type_id');
        $type = $request->input('type');
        if($type == 'project'){
            $expense->project_id = $request->input('project_id');
        }else if($type == 'service'){
            $expense->service_id = $request->input('service_id');
        }
        $expense->employee_id = $request->input('employee_id');
        $expense->bank_id = $request->input('bank_id');
        $expense->transfer_method_id = $request->input('transfer_method_id');
        $expense->value = $request->input('value');
        $expense->percentage_id = $request->input('percentage_id');
        $expense->value_plus_percentage = $request->input('value_plus_percentage');
        $date = Carbon::createFromFormat('m/d/Y', $request->input('date'))->toDateTimeString();
        $expense->date = $date ;
        $expense->details = $request->input('details');
        if($request->hasFile('attachement')){
            $filenameWithExt = $request->file('attachement')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extenstion = $request->file('attachement')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
        }else{
            $fileNameToStore = null;
        }
        $expense->attachement = $fileNameToStore;
        $expense->remarks = $request->input('remarks');
        $expense->save();
        $b = Bank::find($request->input('bank_id'));
        $b->current_balance -= $request->input('value_plus_percentage');
        $b->save();
        return redirect()->route('allExpenses')->with('success', 'تمت إضافة المصروف بنجاح');   
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
