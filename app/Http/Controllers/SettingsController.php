<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Task;
use App\Settings;
use App\ExpenseType;
use App\Bank;
use App\Project;
use App\BankTransfer;
use App\Percentage;
use App\Client;
use Auth;
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
        $expenseTypes = ExpenseType::all();
        $settings = Settings::find(1);
        $banks = Bank::all();
        $bankTransfers = BankTransfer::all();
        $percentages = Percentage::all();
        $projects = Project::all();
        $clients = Client::all();
        return view('Settings.settings')->with([
            'tasks' => $tasks,
            'transferMethods' => $transferMethods,
            'settings' => $settings,
            'expenseTypes' => $expenseTypes,
            'banks' => $banks,
            'percentages' => $percentages,
            'bankTransfers' => $bankTransfers,
            'projects' => $projects,
            'clients' => $clients
        ]);
    }

    public function save(Request $request){
        $permissions = unserialize(Auth::user()->permissions);
        if($permissions == null){
            $permissions = [];
        }
        if(in_array('settingsGeneralEdit',$permissions)){
            $title = $request->input('title');       
            if($title!=''){
                $settings = Settings::find(1);
                $settings->title = $title;
                $settings->save();
            }
            if($request->hasFile('photo')){
                $path = $request->file('photo')->storeAs('public/photos' , 'logo.png');
            }
            return redirect()->route('settings')->with('success', 'تم تعديل إعدادات الموقع');
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }

    }


}
