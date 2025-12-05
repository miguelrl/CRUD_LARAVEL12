<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                // Permite Letras (incluyendo acentos y ñ) y Espacios, y nada más.
                'regex:/^[\p{L}\s]+$/u', 
            ],
            'area' => [
                'required',
                'string',
                'max:255',
                // Permite Letras (incluyendo acentos y ñ) y Espacios, y nada más.
                'regex:/^[\p{L}\s]+$/u', 
            ],
            
            'employee_number' => 'required|string|digits:5|not_in:0000000000',

            
            'address' => [
                'required',
                'string',
                'max:255',
                // ¡MODIFICACIÓN AQUÍ! Ahora permite Letras, Espacios Y Números.
                'regex:/^[\p{L}\s\d]+$/u', 
            ],
            'email' => [
                'required',
                //'email:rfc,dns', // Uso de validación email mejorada
                'max:255',
                //'unique:users,email',
                // REGEX para una validación de formato muy estricta (Opcional pero más detallada)
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
            ],
];
    }


}
