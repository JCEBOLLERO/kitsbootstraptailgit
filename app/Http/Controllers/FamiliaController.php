<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Http\Requests\StoreFamiliaRequest;
use App\Http\Requests\UpdateFamiliaRequest;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familias=Familia::paginate(5);
        return view('familias.index',compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamiliaRequest $request)
    {
        Familia::create($request->validated());
        return redirect()->route('familias.index')->with('success','Familia creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Familia $familia)
    {
        return view('familias.show', compact('familia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familia $familia)
    {
        return view('familias.edit',compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamiliaRequest $request, Familia $familia)
    {
        $familia->update($request->validated());
        return redirect()->route('familias.index')->with('success','Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();
        return redirect()->route('familias.index')->with('success','Familia borrada con éxito');
    }
}
