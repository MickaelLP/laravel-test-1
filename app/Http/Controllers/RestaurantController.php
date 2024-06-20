<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('name','asc')->get();
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Restaurant::class);
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        $data = $request->validated();
        $restaurant = Restaurant::create($data);
        
        return redirect()->route('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
