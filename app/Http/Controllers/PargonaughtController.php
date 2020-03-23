<?php

namespace App\Http\Controllers;

use App\Pargonaught;
use Illuminate\Http\Request;

class PargonaughtController extends Controller
{
    private $STATUS = [
        '0' => 'Unavailable',
        '1' => 'Available',
        '2' => 'Delivering to courier'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pargonaughts = Pargonaught::all();
        $search_route = 'search-pargonaughts';
        return view('pages.pargonaughts.index',['pargonaughts'=>$pargonaughts, 'search_route'=>$search_route, 'statuses'=>$this->STATUS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pargonaughts.pargonaught.create', ['statuses'=>$this->STATUS]);
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
        $pargonaught->name = $request->name;
        $pargonaught->status = $request->status;
        $pargonaught->save();
        return redirect()->route('pargonaughts.index')->with('info','Pargonaught Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function show(Pargonaught $pargonaught)
    {
        return view('pages.pargonaughts.pargonaught.pargonaught', ['user' => $pargonaught::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pargonaught  $pargonaught
     * @return \Illuminate\Http\Response
     */
    public function edit(Pargonaught $pargonaught)
    {
        $pargonaught::find($pargonaught->id);
        return view('pages.pargonaughts.pargonaught.edit',['pargonaught'=> $pargonaught, 'statuses'=>$this->STATUS]);
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
        $pargonaught::find($request->input('id'));
        $pargonaught->status = $request->status;
        $pargonaught->name = $request->name;
        $pargonaught->save(); //persist the data
        return redirect()->route('pargonaughts.index')->with('info','Pargonaught Updated Successfully');
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
