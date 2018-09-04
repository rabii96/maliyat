<?php

namespace App\Http\Controllers;

use App\RealPayment;
use App\ExpectedPayment;
use App\Settings;
use App\Project;
use App\Bank;
use App\Client;
use Carbon\Carbon;
use PDF;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\TransferMethod;
use Illuminate\Http\Request;

class RealPaymentController extends Controller
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
        if(in_array('paymentShow',$permissions)){
            $settings = Settings::find(1);
            $realPayments = RealPayment::all();
            $clients = Client::all();
            $projects = Project::all();
            return view('Payments.allPayments')->with([
                'settings' => $settings,
                'realPayments' => $realPayments,
                'clients' => $clients,
                'projects' => $projects,
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
        if(in_array('paymentAdd',$permissions)){
            $settings = Settings::find(1);
            $projects = Project::all();
            $banks = Bank::all();
            $transferMethods  = TransferMethod::all();
            return view('Payments.addPayment')->with([
                'settings' => $settings,
                'projects' => $projects,
                'banks' => $banks,
                'transferMethods' => $transferMethods
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
        if(in_array('paymentAdd',$permissions)){

            $this->validate($request,[
                'project_id' => 'required',
                'payment_number' => 'required',
                'currentPaidValue' => 'required',
                'to_bank_id' => 'required',
                'attachement' => 'nullable|max:1999'
            ]);
            $payment = new RealPayment;
            $expected_payment_id = $request->input('expected_payment_id');
            $payment->expected_payment_id = $expected_payment_id;
            $payment->project_id = $request->input('project_id');
            $payment->paid_value = $request->input('currentPaidValue');
            $expected_payment = ExpectedPayment::find($expected_payment_id);
            $paidValue = $request->input('currentPaidValue');
            $expected_payment->paid_value += $paidValue;
            $expected_payment->remaining_value -= $paidValue;
            if($expected_payment->remaining_value == '0'){
                $expected_payment->state = 'Paid';
            }
            $expected_payment->save();
            $to_bank_id = $request->input('to_bank_id');
            $payment->to_bank_id = $to_bank_id;
            $to_bank = Bank::find($request->input('to_bank_id'));
            $to_bank->current_balance += $paidValue;
            $to_bank->save();
            $transferMethod = $request->input('transfer_method');
            if($transferMethod != '-1'){
                $payment->transfer_method_id = $transferMethod;
                $tm = TransferMethod::find($transferMethod);
            switch($tm->name){
                case 'باي بال':
                    {
                        $payment->paypal_email = $request->input('paypal_email');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                    case 'بنك':
                    {
                        $payment->from_bank_id = $request->input('from_bank_id');
                        $payment->from_bank_number = $request->input('from_bank_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                case 'شيك':
                    {
                        $payment->from_bank_id = $request->input('from_bank_id');
                        $payment->check_number = $request->input('check_number');
                        $date_check = Carbon::createFromFormat('m/d/Y', $request->input('date_check'))->toDateTimeString();
                        $payment->date = $date_check;
                        break;
                    }
                case 'أخرى':
                    {
                        $payment->from_bank_number = $request->input('other_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                default:
                    {
                        $payment->from_bank_number = $request->input('default_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                }
            }else{
                $date_cash = Carbon::createFromFormat('m/d/Y', $request->input('date_cash'))->toDateTimeString();
                $payment->date = $date_cash;
                $payment->transferer_name = $request->input('transferer_name');
            }


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

            $payment->attachement = $fileNameToStore;
            $payment->save();
            return redirect()->route('allPayments')->with('success', 'تمت إضافة الدفعة بنجاح');   
                
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('paymentEdit',$permissions)){
            $settings = Settings::find(1);
            $payment = RealPayment::find($id);
            if($payment){
                $expected_payments = ExpectedPayment::where([
                    ['project_id', '=' , $payment->project->id]
                ])->get();
                $projects = Project::all();
                $banks = Bank::all();
                $transferMethods  = TransferMethod::all();
                return view('Payments.editPayment')->with([
                    'settings' => $settings,
                    'projects' => $projects,
                    'banks' => $banks,
                    'transferMethods' => $transferMethods,
                    'payment' => $payment,
                    'expected_payments' => $expected_payments,
                ]);
            }else{
                if(! intval($id)== 0)
                    return redirect()->route('allPayments')->with('error', 'هذه الدفعة فير موجودة');
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealPayment  $realPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('paymentEdit',$permissions)){

            $this->validate($request,[
                'project_id' => 'required',
                'payment_number' => 'required',
                'currentPaidValue' => 'required',
                'to_bank_id' => 'required',
                'attachement' => 'nullable|max:1999'
            ]);
            $payment = RealPayment::find($id);
            // reverse payment
            $expected_payment = $payment->expected_payment;
            $paidValue = $payment->paid_value;
            $expected_payment->paid_value -= $paidValue;
            $expected_payment->remaining_value += $paidValue;
            if($expected_payment->remaining_value > '0'){
                $expected_payment->state = 'Unpaid';
            }
            $expected_payment->save();
            $payment->to_bank->current_balance -= $paidValue;
            $payment->to_bank->save();
            // end reverse

            // reset fields
            $payment->expected_payment_id = null;
            $payment->project_id = null;
            $payment->paid_value = null;
            $payment->transfer_method_id = null;
            $payment->to_bank_id = null;
            $payment->date = null;
            $payment->from_bank_id = null;
            $payment->from_bank_number = null;
            $payment->check_number = null;
            $payment->paypal_email = null;
            $payment->transferer_name = null;
            // end reset
            $expected_payment_id = $request->input('expected_payment_id');
            $payment->expected_payment_id = $expected_payment_id;
            $payment->project_id = $request->input('project_id');
            $payment->paid_value = $request->input('currentPaidValue');
            $expected_payment = ExpectedPayment::find($expected_payment_id);
            $paidValue = $request->input('currentPaidValue');
            $expected_payment->paid_value += $paidValue;
            $expected_payment->remaining_value -= $paidValue;
            if($expected_payment->remaining_value == '0'){
                $expected_payment->state = 'Paid';
            }
            $expected_payment->save();
            $to_bank_id = $request->input('to_bank_id');
            $payment->to_bank_id = $to_bank_id;
            $to_bank = Bank::find($request->input('to_bank_id'));
            $to_bank->current_balance += $paidValue;
            $to_bank->save();
            $transferMethod = $request->input('transfer_method');
            if($transferMethod != '-1'){
                $payment->transfer_method_id = $transferMethod;
                $tm = TransferMethod::find($transferMethod);
            switch($tm->name){
                case 'باي بال':
                    {
                        $payment->paypal_email = $request->input('paypal_email');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                    case 'بنك':
                    {
                        $payment->from_bank_id = $request->input('from_bank_id');
                        $payment->from_bank_number = $request->input('from_bank_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                case 'شيك':
                    {
                        $payment->from_bank_id = $request->input('from_bank_id');
                        $payment->check_number = $request->input('check_number');
                        $date_check = Carbon::createFromFormat('m/d/Y', $request->input('date_check'))->toDateTimeString();
                        $payment->date = $date_check;
                        break;
                    }
                case 'أخرى':
                    {
                        $payment->from_bank_number = $request->input('other_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                default:
                    {
                        $payment->from_bank_number = $request->input('default_number');
                        $date = (new Carbon())->toDateTimeString();
                        $payment->date = $date;
                        break;
                    }
                }
            }else{
                $date_cash = Carbon::createFromFormat('m/d/Y', $request->input('date_cash'))->toDateTimeString();
                $payment->date = $date_cash;
                $payment->transferer_name = $request->input('transferer_name');
            }


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
                if($payment->attachement!== null){
                    Storage::delete('public/attachements/'.$payment->attachement);
                }
                $payment->attachement = $fileNameToStore;
            }

            $payment->save();
            return redirect()->route('allPayments')->with('success', 'تم تعديل الدفعة بنجاح');   
                
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('paymentDelete',$permissions)){
            $payment = RealPayment::find($id);
            if($payment){
                // reverse payment
                $expected_payment = $payment->expected_payment;
                $paidValue = $payment->paid_value;
                $expected_payment->paid_value -= $paidValue;
                $expected_payment->remaining_value += $paidValue;
                if($expected_payment->remaining_value > '0'){
                    $expected_payment->state = 'Unpaid';
                }
                $expected_payment->save();
                $payment->to_bank->current_balance -= $paidValue;
                $payment->to_bank->save();
                // end reverse
                if($payment->attachement!== null){
                    Storage::delete('public/attachements/'.$payment->attachement);
                }
                $payment->delete();
                return redirect()->route('allPayments')->with('success', 'تم حذف الدفعة بنجاح');    
            }else{
                if(! intval($id)== 0)
                    return redirect()->route('allPayments')->with('error', 'هذه الدفعة فير موجودة');
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
        
         
    }

    public function updatePaymentNumbers(Request $request){
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('paymentAdd',$permissions)){
            if($request->ajax()){
                $project_id = $request->get('projectId');
                $payments = ExpectedPayment::where([
                    ['project_id', '=' , $project_id],
                    ['state' , 'like' , '%Unpaid%']
                ])->get(); 
                return $payments;
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
        
    }

    public function download($id){
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if((in_array('paymentDownloadPaid',$permissions)) || (in_array('paymentDownloadReceived',$permissions))){
            $payment = RealPayment::find($id);
            $html = view('payments.paymentPDF',['realPayment'=>$payment])->render(); // file render
    
            $pdfarr = [
                'title'=> $payment->project->name.' دفعة '.$payment->expected_payment->index,
                'data'=>$html, // render file blade with content html
                'header'=>['show'=>false], // header content
                'footer'=>['show'=>false], // Footer content
                'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
                'font-size'=>12, // font-size 
                'text'=>'', //Write
                'rtl'=>true, //true or false 
                'filename'=> 'Project '.$payment->project->id.' Payment '.$payment->expected_payment->index.'.pdf', // filename example - invoice.pdf
                'display'=>'download', // stream , download , print
            ];
    
               PDF::HTML($pdfarr);
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    }

}
