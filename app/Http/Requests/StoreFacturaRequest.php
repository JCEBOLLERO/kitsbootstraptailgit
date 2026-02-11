<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreFacturaRequest extends FormRequest
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
            'codcliente' => 'required|integer|exists:clientes,id',
            'cliente' => 'required|string|max:255',
            'fecha' => 'required|date',
            'detalles' => 'required|array|min:1',

            'detalles.*.producto' => 'required|string|max:255',
            'detalles.*.cantidad' => 'required|numeric|min:1',
            'detalles.*.precio' => 'required|numeric|min:0',
        ];
    }
    public function messages() 
    {
        return [
            'codcliente.required' => 'El cliente es obligatorio',
            'cliente.required' => 'El cliente es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.', 
            'detalles.required' => 'Debe agregar al menos un detalle.', 
            'detalles.*.producto.required' => 'El producto es obligatorio.', 
            'detalles.*.cantidad.required' => 'La cantidad es obligatoria.', 
            'detalles.*.precio.required' => 'El precio es obligatorio.', 
        ];
    }

}
