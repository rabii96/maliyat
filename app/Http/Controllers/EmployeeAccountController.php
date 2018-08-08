<?php

namespace App\Http\Controllers;

use App\EmployeeAccount;
use Illuminate\Http\Request;

class EmployeeAccountController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeAccount  $employeeAccount
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAccount $employeeAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeAccount  $employeeAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeAccount $employeeAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeAccount  $employeeAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeAccount $employeeAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeAccount  $employeeAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAccount $employeeAccount)
    {
        //
    }
}
