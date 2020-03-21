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
        return view('pages.pargonaughts.index',['pargonaughts'=>$pargonaughts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pargonaughts.pargonaught.create');
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
        return redirect()->route('pages.pargonaughts.index')->with('info','Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function show(Pargonaught $pargonaught)
    {
        return view('pages.pargonaughts.pargonaught.pargonaught', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function edit(Pargonaught $pargonaught)
    {
        $pargonaught = Pargonaught::find($pargonaught->id);
        return view('pages.pargonaughts.pargonaught.edit',['pargonaught'=> $pargonaught]);
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
        $pargonaught->status = $request->input('status');
        $pargonaught->name = $request->input('name');
        $pargonaught->save(); //persist the data
        return redirect()->route('pages.pargonaughts.index')->with('info','Employee Updated Successfully');
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
