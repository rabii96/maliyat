<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Task;
use App\Settings;
use Config;
use App\TransferMethod;

class SettingsController extends Controller
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
        $tasks = Task::all();
        $transferMethods = TransferMethod::all();
        $settings = Settings::find(1);
        return view('Settings.settings')->with([
            'tasks' => $tasks,
            'transferMethods' => $transferMethods,
            'settings' => $settings,
        ]);
    }

    public function save(Request $request){
        // Todo add permission validation
        $title = $request->input('title');       
        if($title!=''){
            $settings = Settings::find(1);
            $settings->title = $title;
            $settings->save();
        }
        //dd(Config::get('app.name'));
        if($request->hasFile('photo')){
            $path = $request->file('photo')->storeAs('public/photos' , 'logo.png');
        }
        return redirect()->route('settings')->with('success', 'تم تعديل إعدادات الموقع');
    }


}
