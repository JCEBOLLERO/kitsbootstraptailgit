<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'familia_id.required'  => 'Debe seleccionar una familia para el artículo.',
            'proveedor_id.required'=> 'Debe seleccionar un proveedor para el artículo.',
            'preciocosto.required' => 'El precio de costo es obligatorio.',
            'pvp.required'         => 'El precio de venta al público es obligatorio.',
        ];
    }
}


