<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use App\Settings;
use App\Service;
use App\ExpectedPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $settings = Settings::find(1);
        $projects = Project::all();
        $services = Service::all();
        return view('ProjectsAndServices.allProjectsAndServices')->with([
            'settings' => $settings,
            'projects' => $projects,
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $settings = Settings::find(1);
        return view('ProjectsAndServices.addProject')->with([
            'settings' => $settings,
            'clients' => $clients,
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
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Settings::find(1);
        $project = Project::find($id);
        if($project){
            return view('ProjectsAndServices.projectDetails')->with([
                'settings' => $settings,
                'project' => $project,
            ]);
        }else{
            return redirect()->route('allProjectsAndServices')->with('error', 'هذا المشروع غير موجود');   
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function receive($id){
        $project = Project::find($id);
        $project->finished = true;
        $project->save();
        return redirect()->route('allProjectsAndServices')->with('success', 'تم إستلام المشروع بنجاح');   
    }
}
