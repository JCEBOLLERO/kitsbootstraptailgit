<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticuloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'descripcion'   => 'required|string|max:80',
            'familia_id'    => 'required|exists:familias,id',
            'proveedor_id'  => 'required|exists:proveedors,id',
            'preciocosto'   => 'required|numeric|min:0',
            'pvp'           => 'required|numeric|min:0',
            'refprove'      => 'nullable|string|max:20',
            'baja'          => 'nullable|boolean',
        ];
    }

    public function messages() {
        return [ 
            'descripcion.required' => 'La descripción es obligatoria',
            'famila_id.required' => 'Debe seleccionar una familia para el artículos.', 
            'proveedor_id.required' => 'Debe seleccionar un proveedor para el artículos.', 
            'preciocosto.required' => 'El precio de costo es obligatorio.', 
            'pvp.required' => 'El precio de venta al público es obligatorio.', 
        ];
    }
}

