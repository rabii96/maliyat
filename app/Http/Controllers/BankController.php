<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $bank_name = $request->input('bank_name');
            $account_number = $request->input('account_number');
            $initial_balance = $request->input('initial_balance');
            $iban_number = $request->input('iban_number');
            $percentage_name = $request->input('percentage_name');
            $percentage_value = $request->input('percentage_value');
            $test =     ($bank_name != '') &&
                        ($account_number != '') &&
                        ($initial_balance != '') &&
                        ($iban_number !='');
            if($test){
                $bank = new Bank;
                $bank->name = $bank_name;
                $bank->account_number = $account_number;
                $bank->initial_balance = $initial_balance;
                $bank->current_balance = $initial_balance;
                $bank->iban_number = $iban_number;
                $bank->percentage_name = $percentage_name;
                $bank->percentage_value = $percentage_value;
                $bank->save();
                return $bank;
            }else{
                return 'At least one of the "Required" fields is missing';
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
