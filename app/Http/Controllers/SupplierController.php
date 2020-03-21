<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $search_route = 'search-deliveries';
        return view('pages.deliveries.index',['deliveries'=>$deliveries, 'search_route'=>$search_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppliers.supplier.create');
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('pages.suppliers.supplier.supplier', ['Supplier' => Supplier::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $supplier = Supplier::find($supplier->id);
        return view('pages.suppliers.supplier.edit',['supplier'=> $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier = Supplier::find($request->input('id'));
        $supplier->name = $request->input('name');
        $supplier->save(); //persist the data
        return redirect()->route('pages.suppliers.index')->with('info','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
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
