<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['Nombre','CIF','Dirección','Población','Provincia','CodPostal','Teléfono'];
    
}
