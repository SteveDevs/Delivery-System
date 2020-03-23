<?php

namespace App\Http\Controllers;

use App\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    private $STATUS = [
        '0' => 'Supplier',
        '1' => 'Pargo',
        '2' => 'Assigned to Pargonaught',
        '3' => 'Delivery Truck',
        '4' => 'Delevered'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcels = Parcel::all();
        $search_route = 'search-parcels';
        return view('pages.parcels.index',['parcels'=>$parcels, 'search_route'=>$search_route, 'statuses' => $this->STATUS, 'yes_no' => $this->yes_no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.parcels.parcel.create', ['yes_no' => $this->yes_no]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parcels = new Parcel();
        $parcels->location = $request->courier;
        $parcels->discarded = $request->capacity;
        $parcels->payment_amount = $request->payment_amount;
        $parcels->save();
        return redirect()->route('parcels.index')->with('info','Parcel Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        return view('pages.parcels.parcel.parcel', ['parcel' => Parcel::findOrFail($id), 'yes_no' => $this->yes_no]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        $parcel = Parcel::find($parcel->id);
        return view('pages.parcels.parcel.edit',['parcel'=> $parcel, 'yes_no' => $this->yes_no]);
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
        $parcel::find($parcel->id);
        $parcel->location = $request->location;
        $parcel->discarded = $request->discarded;
        $parcel->save(); //persist the data
        return redirect()->route('pages.parcels.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        $parcel::find($id);
        $parcel->delete();
        return redirect()->route('pages.parcels.index');
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
