<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisRequest;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvisRequest $request)
    {
        $data = $request->validated();
        $avis = Avis::create($data);
        $restaurant = $avis->restaurant;
        return redirect()->route('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avis $avis)
    {
        echo $avis;
        dd($avis);
        $this->authorize('update', $avis);

        return view('avis.edit', [
            'avis' => $avis, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avis $avis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        //
    }
}
