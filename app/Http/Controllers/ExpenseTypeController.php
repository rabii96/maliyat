<?php

namespace App\Http\Controllers;

use App\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $expenseTypeName = $request->input('expenseTypeName');
            if($expenseTypeName!=''){
                $expenseType = new ExpenseType;
                $expenseType->name = $expenseTypeName;
                $expenseType->save();
                return($expenseType);
            }else{
                return('Empty expenseType name');
            }     
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $id = $request->input('expenseTypeId');
            $ex = ExpenseType::find($id);
            if($ex){
                $ex->delete();
                return 'Deleted successfully';
            }else{
                return 'This expense type does not exist';
            }
        }
    }
}
