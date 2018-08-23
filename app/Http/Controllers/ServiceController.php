<?php

namespace App\Http\Controllers;

use App\Service;
use App\Settings;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::find(1);
        return view('ProjectsAndServices.addService')->with('settings',$settings);
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
            'attachement' => 'nullable|max:1999'
        ]);
        $service = new Service;
        $service->name = $request->input('name');
        if($request->input('start_date') && $request->input('end_date')){
            $start_date = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->toDateTimeString();
            $service->start_date = $start_date;
            $end_date = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->toDateTimeString();
            $service->end_date = $end_date;
        }
        $service->details = $request->input('details');
        $service->remarks = $request->input('remarks');
        $service->total_cost = $request->input('total_cost');
        if($request->hasFile('attachement')){
            $filenameWithExt = $request->file('attachement')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extenstion = $request->file('attachement')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
        }else{
            $fileNameToStore = null;
        }
        $service->attachement = $fileNameToStore;
        $service->finished = false;
        $service->save();

        return redirect()->route('allProjectsAndServices')->with('success', 'تمت إضافة الخدمة بنجاح');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Settings::find(1);
        $service = Service::find($id);
        if($service){
            return view('ProjectsAndServices.serviceDetails')->with([
                'settings' => $settings,
                'service' => $service
            ]);
        }else{
            return redirect()->route('allProjectsAndServices')->with('error', 'هذه الخدمة غير موجودة');   
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Todo add permission validation
        $settings = Settings::find(1);
        $service = Service::find($id);
        if($service){
            return view('ProjectsAndServices.editService')->with([
                'settings' => $settings,
                'service' => $service
            ]);
        }else{
            return redirect()->route('allProjectsAndServices')->with('error', 'هذه الخدمة غير موجودة');   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Todo add permission validation
        $this->validate($request,[
            'name' => 'required',
            'attachement' => 'nullable|max:1999'
        ]);
        $service = Service::find($id);
        $service->name = $request->input('name');
        if($request->input('start_date') && $request->input('end_date')){
            $start_date = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->toDateTimeString();
            $service->start_date = $start_date;
            $end_date = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->toDateTimeString();
            $service->end_date = $end_date;
        }
        $service->details = $request->input('details');
        $service->remarks = $request->input('remarks');
        $service->total_cost = $request->input('total_cost');
        if($request->hasFile('attachement')){
            $filenameWithExt = $request->file('attachement')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extenstion = $request->file('attachement')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            $path = $request->file('attachement')->storeAs('public/attachements' , $fileNameToStore);
            if($service->attachement!== null){
                Storage::delete('public/attachements/'.$service->attachement);
            }
            $service->attachement = $fileNameToStore;
        }
        $service->save();

        return redirect()->route('allProjectsAndServices')->with('success', 'تم تعديل الخدمة بنجاح');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Todo add permission validation
        $service = Service::find($id);
        if($service->attachement!== null){
            Storage::delete('public/attachements/'.$service->attachement);
        }
        $service->delete();
        return redirect()->route('allProjectsAndServices')->with('success', 'تم حذف الخدمة بنجاح');   
    }

    public function receive($id){
        $service = Service::find($id);
        $service->finished = true;
        $service->save();
        return redirect()->route('allProjectsAndServices')->with('success', 'تم إستلام الخدمة بنجاح');   
    }

    public function download($id){
        $service = Service::find($id);


        $html = view('ProjectsAndServices.servicePDF',['service'=>$service])->render(); // file render

        $pdfarr = [
            'title'=> $service->name,
            'data'=> $html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size 
            'text'=>'', //Write
            'rtl'=>true, //true or false 
            'filename'=>'Service'.$service->id.'.pdf', // filename example - invoice.pdf
            'display'=>'download', // stream , download , print
        ];

   	    PDF::HTML($pdfarr);
    }
}
