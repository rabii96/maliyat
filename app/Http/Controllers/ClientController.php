<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

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
        return view('Users.addClient');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
