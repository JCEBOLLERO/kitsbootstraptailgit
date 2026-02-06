<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable=['cliente', 'fecha', 'total'];

    public function detalles() {
        return $this->hasMany(FacturaDetalle::class);
    }
    
}
