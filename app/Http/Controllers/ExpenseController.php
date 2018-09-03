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
use App\Client;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseShow',$permissions)){
            $settings = Settings::find(1);
            $expenses = Expense::all();
            $clients = Client::all();
            $projects = Project::all();
            $expenseTypes = ExpenseType::all();
            return view('Expenses.allExpenses')->with([
                'settings' => $settings,
                'expenses' => $expenses,
                'clients' => $clients,
                'projects' => $projects,
                'expenseTypes' => $expenseTypes,
            ]);
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseAdd',$permissions)){
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
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseAdd',$permissions)){
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
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseEdit',$permissions)){
    
            $expense = Expense::find($id);
            if($expense){
                $settings = Settings::find(1);
                $expenseTypes = ExpenseType::all();
                $employees = Employee::all();
                $banks = Bank::all();
                $transferMethods = TransferMethod::all();
                $percentages = Percentage::all();
                $projects = Project::all();
                $services = Service::all();
                if($expense->project){
                    $type = 'project';
                }else{
                    $type = 'service';
                }
                return view('Expenses.editExpense')->with([
                    'settings' => $settings,
                    'expenseTypes' => $expenseTypes,
                    'employees' => $employees,
                    'banks' => $banks,
                    'transferMethods' => $transferMethods,
                    'percentages' => $percentages,
                    'projects' => $projects,
                    'services' => $services,
                    'expense' => $expense,
                    'type' => $type
                ]);
            }else{
                if(! intval($id)== 0)
                return redirect()->route('allExpenses')->with('error', 'هذا المصروف فير موجود');    
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseEdit',$permissions)){

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
            $expense = Expense::find($id);
            $expense->name = $request->input('name');
            $expense->expense_type_id = $request->input('type_id');
            $type = $request->input('type');
            if($type == 'project'){
                $expense->project_id = $request->input('project_id');
            }else if($type == 'service'){
                $expense->service_id = $request->input('service_id');
            }
            $expense->employee_id = $request->input('employee_id');
            // reverse expense
            $b = $expense->bank;
            $b->current_balance += $expense->value_plus_percentage;
            $b->save();
            //end reverse
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
                if($expense->attachement !=null){
                    Storage::delete('public/attachements/'.$expense->attachement);
                }
                $expense->attachement = $fileNameToStore;
            }
            $expense->remarks = $request->input('remarks');
            $expense->save();
            $b = Bank::find($request->input('bank_id'));
            $b->current_balance -= $request->input('value_plus_percentage');
            $b->save();
            return redirect()->route('allExpenses')->with('success', 'تم تعديل المصروف بنجاح');   
                
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('expenseDelete',$permissions)){
            $expense = Expense::find($id);
            if($expense){
                // reverse expense
                $b = $expense->bank;
                $b->current_balance += $expense->value_plus_percentage;
                $b->save();
                //end reverse
                if($expense->attachement!== null){
                    Storage::delete('public/attachements/'.$expense->attachement);
                }
                $expense->delete();
                return redirect()->route('allExpenses')->with('success', 'تم حذف المصروف بنجاح');    
            }else{
                if(! intval($id)== 0)
                return redirect()->route('allExpenses')->with('error', 'هذا المصروف فير موجود');    
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }   
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
