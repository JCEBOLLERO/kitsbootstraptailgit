<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends FormRequest
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

            'Nombre' => ['required','string', 'max:50',Rule::unique('proveedors', 'Nombre')->ignore($this->route('proveedor'))],
            'CIF' => 'string|max:10',
            'Dirección' => 'string',
            'Población' => 'string',
            'Provincia' => 'string',
            'CodPostal' => 'string',
            'Teléfono' => 'string'

        ];
    }
}
