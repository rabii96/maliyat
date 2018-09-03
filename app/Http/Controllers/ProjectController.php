<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\Settings;
use App\Service;
use App\ExpectedPayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PDF;
use Auth;

class ProjectController extends Controller
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
        if(in_array('projectShow',$permissions)){
            $settings = Settings::find(1);
            $projects = Project::all();
            $services = Service::all();
            return view('ProjectsAndServices.allProjectsAndServices')->with([
                'settings' => $settings,
                'projects' => $projects,
                'services' => $services
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
        if(in_array('projectAdd',$permissions)){
            $clients = Client::all();
            $settings = Settings::find(1);
            return view('ProjectsAndServices.addProject')->with([
                'settings' => $settings,
                'clients' => $clients,
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
        if(in_array('projectAdd',$permissions)){
            $this->validate($request,[
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'client_id' => 'required',
                'total_cost' => 'required',
                'paymentValue' => 'required',
                'paymentDate' => 'required',
                'attachement' => 'nullable|max:1999'
            ]);
            $project = new Project;
            $project->name = $request->input('name');
            $start_date = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->toDateTimeString();
            $project->start_date = $start_date;
            $end_date = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->toDateTimeString();
            $project->end_date = $end_date;
            $project->details = $request->input('details');
            $project->client_id = $request->input('client_id');
            $project->total_cost = $request->input('total_cost');
            $project->remarks = $request->input('remarks');
            $project->finished = false;
            if($request->hasFile('attachement')){
                $filenameWithExt = $request->file('attachement')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extenstion = $request->file('attachement')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
                $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
            }else{
                $fileNameToStore = null;
            }
            $project->attachement = $fileNameToStore;
            $project->save();
            $expectedPaymentValues = $request->input('paymentValue');
            $expectedPaymentDates = $request->input('paymentDate');
            $i = 0;
            foreach($expectedPaymentValues as $expectedPaymentValue){
                $exp = new ExpectedPayment;
                $exp->project_id = $project->id;
                $exp->value = $expectedPaymentValue;
                $exp->paid_value = 0;
                $exp->index = $i+1;
                $exp->remaining_value = $expectedPaymentValue;
                $date = Carbon::createFromFormat('m/d/Y', $expectedPaymentDates[$i++])->toDateTimeString();
                $exp->date = $date;
                $exp->state = 'Unpaid';
                $exp->save();
            }
            return redirect()->route('allProjectsAndServices')->with('success', 'تمت إضافة المشروع بنجاح');   
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }  
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('projectShow',$permissions)){
            $settings = Settings::find(1);
            $project = Project::find($id);
            if($project){
                return view('ProjectsAndServices.projectDetails')->with([
                    'settings' => $settings,
                    'project' => $project,
                ]);
            }else{
                if(! intval($id)== 0)
                return redirect()->route('allProjectsAndServices')->with('error', 'هذا المشروع غير موجود');   
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
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
        if(in_array('projectEdit',$permissions)){
            $project = Project::find($id);
            $settings = Settings::find(1);
            $clients = Client::all();
            if($project){
                return view('ProjectsAndServices.editProject')->with([
                    'settings' => $settings,
                    'clients' => $clients,
                    'project' => $project,
                ]);
            }else{
                if(! intval($id)== 0)
                return redirect()->route('allProjectsAndServices')->with('error', 'هذا المشروع غير موجود');   
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('projectEdit',$permissions)){
            $project = Project::find($id);
            $project->name = $request->input('name');
            $start_date = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->toDateTimeString();
            $project->start_date = $start_date;
            $end_date = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->toDateTimeString();
            $project->end_date = $end_date;
            $project->details = $request->input('details');
            $project->client_id = $request->input('client_id');
            $project->remarks = $request->input('remarks');
            if($request->hasFile('attachement')){
                $filenameWithExt = $request->file('attachement')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extenstion = $request->file('attachement')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
                $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
                if($project->attachement != null){
                    Storage::delete('public/attachements/'.$project->attachement);
                }
                $project->attachement = $fileNameToStore;
            }
            $project->save();
            $test = $request->input('at_least_one_paid');
            if($test == 'false'){
                $project->total_cost = $request->input('total_cost');
                if (is_array($project->expected_payments) || is_object($project->expected_payments)){
                    foreach($project->expected_payments as $exp){
                        $exp->delete();
                    }
                }
                $expectedPaymentValues = $request->input('paymentValue');
                $expectedPaymentDates = $request->input('paymentDate');
                $i = 0;
                if (is_array($expectedPaymentValues) || is_object($expectedPaymentValues)){
                    foreach($expectedPaymentValues as $expectedPaymentValue){
                        $exp = new ExpectedPayment;
                        $exp->project_id = $project->id;
                        $exp->value = $expectedPaymentValue;
                        $exp->paid_value = 0;
                        $exp->index = $i+1;
                        $exp->remaining_value = $expectedPaymentValue;
                        $date = Carbon::createFromFormat('m/d/Y', $expectedPaymentDates[$i++])->toDateTimeString();
                        $exp->date = $date;
                        $exp->state = 'Unpaid';
                        $exp->save();
                    }
                }
            }else{ // if test == "true"
                $paymentIndex = $request->input('paymentIndex');
                if($paymentIndex == null){
                    $paymentIndex = [];
                }
                $payments_to_change = ExpectedPayment::where([
                    ['project_id' , '=' , $id]
                ])->whereIn('index' , $paymentIndex)->get();
                $j = 0;
                $paymentDate = $request->input('paymentDate');
                if (is_array($payments_to_change) || is_object($payments_to_change)){
                    foreach($payments_to_change as $p){
                        $date = Carbon::createFromFormat('m/d/Y', $paymentDate[$j++])->toDateTimeString();
                        $p->save();
                    }
                }
            }
            return redirect()->route('allProjectsAndServices')->with('success', 'تم تعديل المشروع بنجاح');   
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من عرض هذه الصفحة');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('projectDelete',$permissions)){
            $project = Project::find($id);
            if($project->attachement!== null){
                Storage::delete('public/attachements/'.$project->attachement);
            }
            if($project->expenses){
                foreach($project->expenses as $ex){
                    $bank = $ex->bank;
                    $bank->current_balance += $ex->value_plus_percentage ;
                    $bank->save();
                    $ex->delete();
                }
            }
            if($project->real_payments){
                foreach($project->real_payments as $payment){
                    $expected_payment = $payment->expected_payment;
                    // reverse payment
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
                }
            }
            if($project->expected_payments){
                foreach($project->expected_payments as $exp){
                    $exp->delete();
                }
            }
            $project->delete();
            return redirect()->route('allProjectsAndServices')->with('success', 'تم حذف المشروع بنجاح');   
        }else{
            return redirect()->route('allProjectsAndServices')->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
        
    }

    public function receive($id){
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('projectShow',$permissions)){
            $project = Project::find($id);
            $project->finished = true;
            $project->save();
            return redirect()->route('allProjectsAndServices')->with('success', 'تم إستلام المشروع بنجاح');   
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }

    }

    public function download($id){
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('projectDownload',$permissions)){
            $project = Project::find($id);
            $html = view('ProjectsAndServices.projectPDF',['project'=>$project])->render(); // file render
    
            $pdfarr = [
                'title'=> $project->name,
                'data'=>$html, // render file blade with content html
                'header'=>['show'=>false], // header content
                'footer'=>['show'=>false], // Footer content
                'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
                'font-size'=>12, // font-size 
                'text'=>'', //Write
                'rtl'=>true, //true or false 
                'filename'=>'Project'.$project->id.'.pdf', // filename example - invoice.pdf
                'display'=>'download', // stream , download , print
            ];
    
            PDF::HTML($pdfarr);
        }else{
            return redirect()->route('allProjectsAndServices')->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
        
    }
}
