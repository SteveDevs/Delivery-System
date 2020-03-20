<?php

namespace App\Http\Controllers;

use App\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
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
        return view('parcel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parcel = new Parcel();
        $parcel->firstname = $request->input('firstname');
        $parcel->lastname = $request->input('lastname');
        $parcel->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->route('parcels.index')->with('info','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        return view('parcel.parcel', ['parcel' => Parcel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        $parcel = Parcel::find($id);
        return view('parcel.edit',['parcel'=> $parcel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel)
    {
        $parcel = Parcel::find($request->input('id'));
        $parcel->firstname = $request->input('firstname');
        $parcel->lastname = $request->input('lastname');
        $parcel->department = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save(); //persist the data
        return redirect()->route('parcels.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        $parcel = Parcel::find($id);
        $parcel->delete();
        return redirect()->route('parcels.index');
    }
}
