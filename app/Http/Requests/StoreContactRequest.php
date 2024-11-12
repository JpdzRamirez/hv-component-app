<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        //Reglas de validación para cración de un perfil Presentation
        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:presentation'],
            'contact' => ['required', 'string', 'regex:/^[0-9]+$/', 'min:10', 'max:50'],
            'message' => ['required', 'string', 'max:500'],  // max:500 por el tipo mediumText
        ];

        return $rules;
    }
}
