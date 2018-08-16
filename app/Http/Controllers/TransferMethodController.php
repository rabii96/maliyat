<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransferMethod;
class TransferMethodController extends Controller
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
            $transferMethodName = $request->input('transferMethodName');
            if($transferMethodName!=''){
                $transferMethod = new TransferMethod;
                $transferMethod->name = $transferMethodName;
                $transferMethod->save();
                return($transferMethod);
            }else{
                return('Empty transfer method name');
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
            $id = $request->input('transferMethodId');
            $t = TransferMethod::find($id);
            if($t){
                $t->delete();
                return 'Deleted successfully';
            }else{
                return 'This transfer method does not exist';
            }
        }
    }
}
