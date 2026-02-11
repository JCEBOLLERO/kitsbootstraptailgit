<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [ 'nombre', 'cif', 'direccion', 'poblacion', 'provincia', 'codpostal', 'telefono1', 'telefono2', 'correo', 'observaciones', ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'codcliente');
    }

}
