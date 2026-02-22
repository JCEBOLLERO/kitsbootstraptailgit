<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['referencia', 'descripcion', 'familia_id', 'proveedor_id', 'preciocosto', 'pvp', 'refprove', 'baja'];

    public function familia() {
        return $this->belongsTo(Familia::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

}
