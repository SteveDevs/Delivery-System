<?php

namespace App\Http\Controllers;

use App\Pargonaught;
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
        $pargonaughts = Pargonaught::all();
        return view('pargonaughts.index',['pargonaughts'=>$pargonaughts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pargonaught.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pargonaught = new Pargonaught();
        $pargonaught->firstname = $request->input('firstname');
        $pargonaught->lastname = $request->input('lastname');
        $pargonaught->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('pargonaught.index')->with('info','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function show(Pargonaught $pargonaught)
    {
        return view('pargonaught.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function edit(Pargonaught $pargonaught)
    {
        $pargonaught = Pargonaught::find($id);
        return view('pargonaught.edit',['pargonaught'=> $pargonaught]);
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
        $pargonaught = Pargonaught::find($request->input('id'));
        $pargonaught->firstname = $request->input('firstname');
        $pargonaught->lastname = $request->input('lastname');
        $pargonaught->department = $request->input('department');
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
