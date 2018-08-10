<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Settings;
use App\Client;
use App\Employee;
use PDF;

class UsersController extends Controller
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
        $users = User::all();
        $clients = Client::all();
        $settings = Settings::find(1);
        $employees = Employee::with([
            'task',
            'employee_accounts'
            ])->get();
        return view('Users.allUsers')->with([
            'users' => $users ,
            'clients' => $clients,
            'employees' => $employees, 
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::find(1);
        return view('Users.addUser')->with('settings',$settings);
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
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);
        $permissions = serialize($request->input('permissions'));
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->permissions = $permissions;
        $user->description = $request->input('description');
        if($request->hasFile('photo')){
            // Get filename withe the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extenstion = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            // Upload image
            $path = $request->file('photo')->storeAs('public/photos' , $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $user->photo = $fileNameToStore;
        $user->save();
        
        return redirect()->route('allUsers')->with('success', 'تمت إضافة المستخدم بنجاح');        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Todo add permission validation
        $user = User::find($id);
        $settings = Settings::find(1);
        if($user){
            return view('Users.editUser')->with([
                'user' => $user,
                'settings' => $settings,
            ]);
        }else{
            if(! intval($id)== 0)
                return redirect()->route('allUsers')->with('error', 'هذا المستعمل فير موجود');
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
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);
        $permissions = serialize($request->input('permissions'));
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->permissions = $permissions;
        $user->description = $request->input('description');
        if($request->hasFile('photo')){
            // Get filename withe the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extenstion = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            // Upload image
            $path = $request->file('photo')->storeAs('public/photos' , $fileNameToStore);
            if($user->photo!== 'noimage.jpg'){
                Storage::delete('public/photos/'.$user->photo);
            }
            $user->photo = $fileNameToStore;
        }
        $user->save();
        
        return redirect()->route('allUsers')->with('success', 'تم تعديل المستخدم بنجاح');        
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
        $user = User::find($id);
        if($user->photo!== 'noimage.jpg'){
            Storage::delete('public/photos/'.$user->photo);
        }
        $user->delete();

        return redirect()->route('allUsers')->with('success', 'تم حذف المستخدم بنجاح');        
    }

    public function download($id){
        $user = User::find($id);

      //  return view('users.userPDF')->with('user', $user);

        $html = view('users.userPDF',['user'=>$user])->render(); // file render

        $pdfarr = [
            'title'=> $user->username,
            'data'=>$html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size 
            'text'=>'', //Write
            'rtl'=>true, //true or false 
            'filename'=>$user->username.'.pdf', // filename example - invoice.pdf
            'display'=>'download', // stream , download , print
        ];

   	    PDF::HTML($pdfarr);
    }
}
