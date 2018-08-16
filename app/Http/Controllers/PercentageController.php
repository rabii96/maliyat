<?php

namespace App\Http\Controllers;

use App\Percentage;
use Illuminate\Http\Request;

class PercentageController extends Controller
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
            $percentageName = $request->input('percentageName');
            $percentageValue = $request->input('percentageValue');
            $remarks = $request->input('remarks');
            if(($percentageName!='')&&($percentageValue!='')){
                $percentage = new Percentage;
                $percentage->name = $percentageName;
                $percentage->value = $percentageValue;
                $percentage->remarks = $remarks;
                $percentage->save();
                return($percentage);
            }else{
                return('Empty percentage name or value !');
            }     
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Percentage  $percentage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Todo add permission validation
        $percentage = Percentage::find($id);
        if($percentage){
            $percentage->delete();
            return redirect()->route('settings')->with('success', 'تم حذف النسبة بنجاح');        
        }else{
            return redirect()->route('settings')->with('error', 'هذه النسبة غير موجودة');        
        }

    }
}
