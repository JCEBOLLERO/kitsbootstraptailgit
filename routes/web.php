<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;

use App\Models\Articulo;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource("notes", NoteController::class)->middleware('auth');
Route::resource("students", StudentController::class)->middleware('auth');
Route::resource("proveedors",ProveedorController::class)->middleware('auth');
Route::resource("facturas",FacturaController::class)->middleware('auth');
Route::resource("clientes",ClienteController::class)->middleware('auth');
Route::resource("familias",FamiliaController::class)->middleware('auth');
Route::resource("articulos",ArticuloController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/api/articulos/{ref}', function ($ref) {
    $art = Articulo::where('referencia', $ref)->first();

    if (!$art) {
        return response()->json(null, 404);
    }

    return response()->json([
        'descripcion' => $art->descripcion,
        'precio'      => $art->pvp,
        'costo'       => $art->preciocosto,
    ]);
});

Route::get('/api/articulos', function (Illuminate\Http\Request $request) {
    $search = $request->query('search');

    return Articulo::where('descripcion', 'like', "%{$search}%")
        ->orderBy('descripcion')
        ->limit(50)
        ->get(['referencia as ref', 'descripcion', 'pvp as precio', 'preciocosto as costo']);
});



require __DIR__ . '/auth.php';
