<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
            'Nombre' => 'required|string|min:3|max:50|unique:proveedors,Nombre',
            'CIF' => 'required|string|min:8|max:10',
            'Dirección' => 'string',
            'Población' => 'string',
            'Provincia' => 'string',
            'CodPostal' => 'string',
            'Teléfono' => 'string'
        ];
    }
}
