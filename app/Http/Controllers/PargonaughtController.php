<?php

namespace App\Http\Controllers;

use App\pargonaught;
use Illuminate\Http\Request;

class PargonaughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels = Parcel::all();
        return view('parcels.index',['parcels'=>$parcels]);
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
        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('employees.index')->with('info','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function show(pargonaught $pargonaught)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function edit(pargonaught $pargonaught)
    {
        $employee = Employee::find($id);
        return view('employee.edit',['employee'=> $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pargonaught $pargonaught)
    {
        $employee = Employee::find($request->input('id'));
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save(); //persist the data
        return redirect()->route('employees.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function destroy(pargonaught $pargonaught)
    {
        //
    }
}
