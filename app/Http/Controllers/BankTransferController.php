<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankTransfer;
use App\Bank;
use App\Settings;
use App\Percentage;
use Illuminate\Support\Facades\Storage;
use PDF;

class BankTransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        if($request->ajax()){
            $transfer_amount = $request->input('transfer_amount');
            $net_transfer_amount = $request->input('net_transfer_amount');
            $percentage_id = $request->input('percentage_id');
            if(!is_numeric($percentage_id)){
                $percentage_id = null;
            }
            $transfer_percentage_value = $request->input('transfer_percentage_value');
            if($transfer_percentage_value == ''){
                $transfer_percentage_value = 0;
            }
            $from_bank_id = $request->input('from_bank_id');
            $to_bank_id = $request->input('to_bank_id');
            if(($transfer_amount!='')&&($net_transfer_amount!='')&&($from_bank_id!='')&&($to_bank_id!='')){
                $fromBank = Bank::find($from_bank_id);
                $toBank = Bank::find($to_bank_id);
                if($fromBank->current_balance>=$transfer_amount){
                    $bt = new BankTransfer;
                    $bt->transfer_amount = $transfer_amount;
                    $bt->net_transfer_amount = $net_transfer_amount;
                    $bt->percentage_id = $percentage_id;
                    $bt->transfer_percentage = $transfer_percentage_value;
                    $bt->from_bank_id = $from_bank_id;
                    $bt->to_bank_id = $to_bank_id;
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
            
                    $bt->attachement = $fileNameToStore;
                    $bt->save();
                    $fromBank->current_balance -= $transfer_amount;
                    $toBank->current_balance += $net_transfer_amount;
                    $fromBank->save();
                    $toBank->save();
                    return $bt;
                }else{
                    return '  المبلغ المحول  '
                    .'('.$transfer_amount.' ريال )'
                    .'  أكبر من الرصيد الحالي  ('.$fromBank->current_balance.' ريال )';
                    
                }
            }else{
                return 'الرجاء ملأ الخانات اللازمة';
            }
        }
    }

    public function edit($id)
    {
        // Todo add permission validation
        $bankTransfer = BankTransfer::find($id);
        $settings = Settings::find(1);
        $banks = Bank::all();
        $percentages = Percentage::all();
        if($bankTransfer){
            return view('settings.editBankTransfer')->with([
                'bankTransfer' => $bankTransfer,
                'settings' => $settings,
                'banks' => $banks,
                'percentages' => $percentages,
            ]);
        }else{
            if(! intval($id)== 0)
                return redirect()->route('settings')->with('error', 'هذا التحويل فير موجود');        
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'select_from_bank' => 'required',
            'select_to_bank' => 'required',
            'transfer_amount' => 'required',
            'net_transfer_amount' => 'required',
            'attachement' => 'nullable|max:1999'
        ]);
        // Reverse the existing transfer
        $bt = BankTransfer::find($id);
        $bt->from_bank->current_balance += $bt->transfer_amount;
        $bt->to_bank->current_balance -= $bt->net_transfer_amount;
        $bt->from_bank->save();
        $bt->to_bank->save();
        $bt->percentage_id = null;
        $bt->transfer_percentage = 0;
        // Apply then new transfer
        $transfer_amount = $request->input('transfer_amount');
        $net_transfer_amount = $request->input('net_transfer_amount');
        $percentage_id = $request->input('percentage_id');
        if(!is_numeric($percentage_id)){
            $percentage_id = null;
        }
        $transfer_percentage_value = $request->input('transfer_percentage_value');
        if($transfer_percentage_value == ''){
            $transfer_percentage_value = 0;
        }
        $from_bank_id = $request->input('select_from_bank');
        $to_bank_id = $request->input('select_to_bank');
        $fromBank = Bank::find($from_bank_id);
        $toBank = Bank::find($to_bank_id);
        if($fromBank->current_balance>=$transfer_amount){
            $bt->transfer_amount = $transfer_amount;
            $bt->net_transfer_amount = $net_transfer_amount;
            $bt->percentage_id = $percentage_id;
            $bt->transfer_percentage = $transfer_percentage_value;
            $bt->from_bank_id = $from_bank_id;
            $bt->to_bank_id = $to_bank_id;
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
                if($bt->attachement!== null){
                    Storage::delete('public/attachements/'.$bt->attachement);
                }
                $bt->attachement = $fileNameToStore;
            }
    
            $bt->save();
            $fromBank->current_balance -= $transfer_amount;
            $toBank->current_balance += $net_transfer_amount;
            $fromBank->save();
            $toBank->save();
            return redirect()->route('settings')->with('success', 'تم تعديل التحويل بنجاح');   
        }else{
            return redirect()->route('settings')->with('error',   
            '  المبلغ المحول  '
            .'('.$transfer_amount.' ريال )'
            .'  أكبر من الرصيد الحالي  ('.$fromBank->current_balance.' ريال )');
        }
    }

    public function download($id){
        $bankTransfer = BankTransfer::find($id);

        $html = view('settings.bankTransferPDF',['bankTransfer'=>$bankTransfer])->render(); // file render

        $pdfarr = [
            'title'=> 'تحويل',
            'data'=>$html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size 
            'text'=>'', //Write
            'rtl'=>true, //true or false 
            'filename'=>'Transfer'.$bankTransfer->id.'.pdf', // filename example - invoice.pdf
            'display'=>'download', // stream , download , print
        ];

   	    PDF::HTML($pdfarr);
    }

    public function destroy($id){
        $bt = BankTransfer::find($id);
        $bt->from_bank->current_balance += $bt->transfer_amount;
        $bt->to_bank->current_balance -= $bt->net_transfer_amount;
        $bt->from_bank->save();
        $bt->to_bank->save();
        if($bt->attachement!== null){
            Storage::delete('public/attachements/'.$bt->attachement);
        }
        $bt->delete();
        return redirect()->route('settings')->with('success', 'تم حذف التحويل بنجاح');        
    }
}
