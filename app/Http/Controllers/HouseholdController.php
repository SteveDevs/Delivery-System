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
        return view('pages.households.index',['households'=>$households]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.households.household.create');
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
        $household->name = $request->input('name');
        $employee->save();
        return redirect()->route('pages.households.index')->with('info','Household Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function show(Household $household)
    {
        return view('pages.households.household.household', ['household' => Household::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Household  $household
     * @return \Illuminate\Http\Response
     */
    public function edit(Household $household)
    {
        $household = Household::find($household->id);
        return view('pages.households.household.edit',['household'=> $household]);
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
        $household->name = $request->input('name');
        $household->save(); //persist the data
        return redirect()->route('pages.households.index')->with('info','Household Updated Successfully');
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

    /**
     * Method to search the users.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search_box');
        $searchRules = [
            'search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'search_box.required' => 'Search term is required',
            'search_box.string'   => 'Search term has invalid characters',
            'search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = Delivery::where('id', 'like', $searchTerm.'%')
                            ->orWhere('courier', 'like', $searchTerm.'%')
                            ->orWhere('capacity', 'like', $searchTerm.'%')->get();

        // Attach roles to results
        foreach ($results as $result) {
            $data = [
                'courier' => $result->courier,
                'capacity' => $result->capacity,
            ];
            $result->push($roles);
        }

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }
}
