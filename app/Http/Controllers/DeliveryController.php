<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Pargonaught;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    private $STATUS = [
        '0' => 'Awaiting parcels',
        '1' => 'Delivering parcels',
        '2' => 'Delivered parcels'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $search_route = 'search-deliveries';
        return view('pages.deliveries.index',['deliveries'=>$deliveries, 'search_route'=>$search_route, 'statuses'=>$this->STATUS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.deliveries.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delivery = new Delivery();
        $delivery->courier = $request->courier;
        $delivery->capacity = $request->capacity;
        $delivery->save();
        return redirect()->route('deliveries.index')->with('info','Delivery Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        return view('pages.deliveries.delivery.delivery', ['delivery' => delivery::findOrFail($delivery->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $delivery::find($delivery->id);
        return view('pages.deliveries.delivery.edit',['delivery'=> $delivery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $delivery::find($request->id);
        $delivery->courier = $request->courier;
        $delivery->capacity = $request->capacity;
        $delivery->save(); //persist the data
        return redirect()->route('deliveries.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
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
            $result->push($data);
        }

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }

    public function show_assign_pargonaughts($id){
        $pargonaughts = Pargonaught::where('status', '1')->get();
        $parcels = DB::table('deliveries')
            ->join('delivery_parcels', 'deliveries.id', '=', 'delivery_parcels.delivery_id')
            ->join('parcels', 'delivery_parcels.parcel_id', '=', 'parcels.id')
            ->where('deliveries.id', '=', $id)
            ->get(); 
        return view('pages.deliveries.delivery.assign-pargonaughts',['pargonaughts' => $pargonaughts, 'delivery_id' => $id, 'parcels' => $parcels]);
    }

    public function assign_pargonaughts(Request $request, $delivery_id){
        foreach($request as $key => $value){
           
        }
        return redirect()->route('deliveries.index')->with('info','Employee Updated Successfully');
    }
}
