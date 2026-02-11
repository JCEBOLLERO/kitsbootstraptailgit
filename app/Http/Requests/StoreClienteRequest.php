<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nombre'        => ['required', 'string', 'max:50'],
            'cif'           => ['required', 'string', 'max:10'],

            'direccion'     => ['nullable', 'string', 'max:80'],
            'poblacion'     => ['nullable', 'string', 'max:50'],
            'provincia'     => ['nullable', 'string', 'max:80'],
            'codpostal'     => ['nullable', 'string', 'max:10'],

            'telefono1'     => ['nullable', 'string', 'max:10'],
            'telefono2'     => ['nullable', 'string', 'max:10'],

            'correo'        => ['nullable', 'email', 'max:100'],

            'observaciones' => ['nullable', 'string'],
        ];
    }

}
