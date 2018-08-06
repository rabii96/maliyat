<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\TransferMethod;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $transferMethods = TransferMethod::all();
        return view('Settings.settings')->with([
            'tasks' => $tasks,
            'transferMethods' => $transferMethods,
        ]);
    }


}
