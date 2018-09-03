<?php

namespace App\Http\Controllers;

use App\Client;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::find(1);
        return view('Users.addClient')->with('settings', $settings);
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
        $client = new Client;
        $client->name = $request->input('name');
        $client->description = $request->input('description');

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

        $client->attachement = $fileNameToStore;
        $client->save();
        
        return redirect()->route('allUsers')->with('success', 'تمت إضافة العميل بنجاح');   
    }



    public function edit($id)
    {
        // Todo add permission validation
        $client = Client::find($id);
        $settings = Settings::find(1);
        if($client){
            return view('Users.editClient')->with([
                'client' => $client,
                'settings' => $settings
            ]);
        }else{
            if(! intval($id)== 0)
                return redirect()->route('allUsers')->with('error', 'هذا العميل فير موجود');        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'attachement' => 'nullable|max:1999'
        ]);
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->description = $request->input('description');

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
            if($client->attachement!== null){
                Storage::delete('public/attachements/'.$client->attachement);
            }
            $client->attachement = $fileNameToStore;
        }

       
        $client->save();
        
        return redirect()->route('allUsers')->with('success', 'تم تعديل العميل بنجاح');   
    }
  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Todo add permission validation
        $client = Client::find($id);
        if($client->attachement!== null){
            Storage::delete('public/attachements/'.$client->attachement);
        }
        $client->delete();

        return redirect()->route('allUsers')->with('success', 'تم حذف العميل بنجاح');        
    }

    public function download($id){
        $client = Client::find($id);


        $html = view('Users.clientPDF',['client'=>$client])->render(); // file render

        $pdfarr = [
            'title'=> $client->name,
            'data'=>$html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size 
            'text'=>'', //Write
            'rtl'=>true, //true or false 
            'filename'=>$client->name.'.pdf', // filename example - invoice.pdf
            'display'=>'download', // stream , download , print
        ];

   	    PDF::HTML($pdfarr);
    }
}
