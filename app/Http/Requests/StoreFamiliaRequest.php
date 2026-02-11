<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreFamiliaRequest extends FormRequest
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
            'descripcion'        => ['required', 'string', 'max:50'],
            'nemotecnico'        => ['required', 'string', 'max:3'],
        ];
    }
    public function messages() {
        return [ 
            'descripcion.required' => 'La descripción es obligatoria',
            'nemotecnico.required' => 'El nemotécnico es obligatorio.', 
        ];
    }
}
