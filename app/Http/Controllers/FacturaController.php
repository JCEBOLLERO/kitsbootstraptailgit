<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Factura;
use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateFacturaRequest;



class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas=Factura::paginate(5);
        return view('facturas.index',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacturaRequest $request)
    {
        $validated= $request->validated();
        DB::transaction(function () use ($validated) {
            // Crear factura (maestro) 
            $factura = Factura::create([
                'cliente' => $validated['cliente'],
                'fecha' => $validated['fecha'], 
                'total' => 0,
            ]);
            $total = 0;
            // Crear detalles
            foreach ($validated['detalles'] as $detalle) { 
                
                $detalle['subtotal'] = $detalle['cantidad'] * $detalle['precio']; 
                $total += $detalle['subtotal']; 
                $factura->detalles()->create($detalle);
            } 
            // Actualizar total 
            $factura->update(['total' => $total]); 
        }); return redirect()->route('facturas.index') ->with('success', 'Factura creada correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        return view('facturas.show',compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        {
        $factura->load('detalles');
        return view('facturas.edit', compact('factura'));
}
    }

    /**
     * Update the specified resource in storage.
     */
    

public function update(UpdateFacturaRequest $request, Factura $factura)
{
 //   $validated = $request->validated();
 //   dd($request->request);
    $factura->update([
        'cliente_id' => $request->cliente_id,
        'fecha' => $request ->fecha,
      //  'descripcion' => $request ->descripcion,
        'total' => 0,
    ]);
    
    $factura->detalles()->delete();
    $subtotal = 0;
 //   dd($subtotal);
 //   dd($validated['detalles']);
 //   dd($request->items);
    foreach ($request->input('detalles', []) as $item) {
        // dd($request->detalles);
       // dd($request->input('detalles',[]));
        // dd($detalle);
        $lineaSubtotal = $item['cantidad'] * $item['precio'];
        $subtotal += $lineaSubtotal;
       // dd($subtotal);
        $factura->detalles()->create([
                'producto' => $item['producto'],
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio'],
                'subtotal' => $lineaSubtotal,
        ]);
    };

    // DB::transaction(function () use ($validated, $factura) {

        // Actualizar maestro
       //  $factura->update([
          //  'cliente' => $validated['cliente'],
           // 'fecha' => $validated['fecha'],
 //       ]);

        // Borrar detalles anteriores
   //     $factura->detalles()->delete();

    //    $total = 0;

        // Insertar nuevos detalles
//        foreach ($validated['detalles'] as $detalle) {
  //        $detalle['subtotal'] = $detalle['cantidad'] * $detalle['precio'];
    //        $total += $detalle['subtotal'];

    //  $factura->detalles()->create($detalle);
      //  }

        // Actualizar total
    //    dd($subtotal);
        $factura->update(['total' => $subtotal]);
  //  });

    return redirect()->route('facturas.index')
                     ->with('success', 'Factura actualizada correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
