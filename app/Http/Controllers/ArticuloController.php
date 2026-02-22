<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Familia;
use App\Models\Proveedor;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $articulos = Articulo::with(['familia', 'proveedor']) ->paginate(10); 
        return view('articulos.index', compact('articulos')); }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::pluck('descripcion','id');
        $proveedores = Proveedor::pluck('nombre','id');
        return view('articulos.create', compact('familias','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticuloRequest $request)
{
    // 1. Obtener la familia
    $familia = Familia::findOrFail($request->familia_id);

    // 2. Nemotécnico
    $nemotec = strtoupper($familia->nemotecnico);

    // 3. Año en dos dígitos
    $anio = now()->format('y'); // ejemplo: "24"

    // 4. Contar artículos existentes en esa familia
    $contador = Articulo::where('familia_id', $familia->id)->count() + 1;

    // 5. Convertir a 3 dígitos
    $numero = str_pad($contador, 3, '0', STR_PAD_LEFT);

    // 6. Construir referencia final
    $referencia = "{$nemotec}{$anio}-{$numero}";

    // 7. Crear artículo
    Articulo::create([
        'referencia'   => $referencia,
        'descripcion'  => $request->descripcion,
        'familia_id'   => $request->familia_id,
        'proveedor_id' => $request->proveedor_id,
        'preciocosto'  => $request->preciocosto,
        'pvp'          => $request->pvp,
        'refprove'     => $request->refprove,
        'baja'         => $request->boolean('baja'),
    ]);

    return redirect()
        ->route('articulos.index')
        ->with('success', 'Artículo creado correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', ['articulo' => $articulo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        $familias = Familia::pluck('descripcion','id');
        $proveedores = Proveedor::pluck('nombre','id');
        return view('articulos.edit', compact('articulo', 'familias', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $articulo->update($request->validated());
        return redirect()->route('articulos.index')->with('success','Artículo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}
