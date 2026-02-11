<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable=['codcliente', 'cliente', 'fecha', 'total'];

    public function detalles() {
        return $this->hasMany(FacturaDetalle::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'codcliente');
    }


}
