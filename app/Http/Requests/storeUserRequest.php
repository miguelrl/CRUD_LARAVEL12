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
            'name' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'employee_number' => 'required|integer|digits_between:1,20',
            'address' => 'required|string',
            'email' => [
                'required',
                'email:rfc,dns', // Uso de validación email mejorada
                'max:255',
                'unique:users,email',
                // REGEX para una validación de formato muy estricta (Opcional pero más detallada)
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
            ],
];
    }


}
