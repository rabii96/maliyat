<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        if(in_array('settingsGeneralAdd',$permissions)){
            if($request->ajax()) {
                $taskName = $request->input('taskName');
                if($taskName!=''){
                    $task = new Task;
                    $task->name = $taskName;
                    $task->save();
                    return($task);
                }else{
                    return('Empty task name');
                }     
            }
        }else{
            return redirect()->back()->with('error', 'صلاحياتك لا تمكنك من القيام بهذه العملية');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $id = $request->input('taskId');
            $t = Task::find($id);
            if($t){
                $t->delete();
                return 'Deleted successfully';
            }else{
                return 'This task does not exist';
            }
        }
    }
}
