<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $fillable=[
        'factura_id', 'producto', 'cantidad', 'precio', 'subtotal'
    ];

    public function factura() {
        return $this->belongsTo(Factura::class);
    }
}
