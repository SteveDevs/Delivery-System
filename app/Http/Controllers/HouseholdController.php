<?php

namespace App\Http\Controllers;

use App\Household;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $households = Household::all();
        return view('households.index',['households'=>$households]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('household.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $household = new Household();
        $household->firstname = $request->input('firstname');
        $household->lastname = $request->input('lastname');
        $household->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('employees.index')->with('info','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function show(Household $household)
    {
        return view('household.household', ['household' => Household::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function edit(Household $household)
    {
        $household = Household::find($id);
        return view('household.edit',['household'=> $household]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Household $household)
    {
        $household = Household::find($request->input('id'));
        $household->firstname = $request->input('firstname');
        $household->lastname = $request->input('lastname');
        $household->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save(); //persist the data
        return redirect()->route('households.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function destroy(Household $household)
    {
        //
    }
}
