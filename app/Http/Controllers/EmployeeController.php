<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeAccount;
use App\Task;
use App\TransferMethod;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transferMethods = TransferMethod::all();
        $tasks = Task::all();
        return view('Users.addEmployee')->with([
            'transferMethods' => $transferMethods,
            'tasks' => $tasks,
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
            'employee_task' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'transferMethodSelect' => 'required',
            'attachement' => 'nullable|max:1999'
        ]);
        $employee = new Employee;
        $employee->name = $request->input('name');
        $taskId = $request->input('employee_task');
        $employee->task_id = $taskId;
        $employee->description = $request->input('description');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');


        if($request->hasFile('attachement')){
            // Get filename withe the extension
            $filenameWithExt = $request->file('attachement')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extenstion = $request->file('attachement')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            // Upload image
            $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
        }else{
            $fileNameToStore = null;
        }

        $employee->attachement = $fileNameToStore;

        $transferMethod = $request->input('transferMethodSelect');

        if($transferMethod != '0'){
            $tm = TransferMethod::find($transferMethod);
            $employee->save();
         //   dd($tm->name);
            switch($tm->name){
                case 'باي بال':
                    {
                        $paypal_emails = $request->input('paypal_emails');
                        foreach($paypal_emails as $paypal_email){
                            $account = new EmployeeAccount;
                            $account->transfer_method_id = $tm->id;
                            $account->paypal_email = $paypal_email;
                            $account->employee_id = $employee->id;
                            $account->save();

                        }
                        break;
                    }
                case 'بنك':
                    {
                        $employee_bank_names = $request->input('employee_bank_names');
                        $employee_bank_number = $request->input('employee_bank_numbers');
                        $i = 0;
                        foreach($employee_bank_names as $employee_bank_name){
                            $account = new EmployeeAccount;
                            $account->transfer_method_id = $tm->id;
                            $account->bank_name = $employee_bank_name;
                            $account->bank_account_number = $employee_bank_number[$i++];
                            $account->employee_id = $employee->id;
                            $account->save();
                        }
                        break;
                    }
                case 'شيك':
                    //todo
                    break;
                default:
                    //todo
            }
        }



        return redirect()->route('allUsers')->with('success', 'تمت إضافة مقدم الخدمة بنجاح');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
