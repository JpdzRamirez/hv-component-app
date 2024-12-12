<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'company' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'main_role' => ['required', 'string', 'max:255'], 
            'goals' => ['required', 'string', 'max:500'],  // max:500 por el tipo mediumText
            'status_working' => ['required', 'boolean'],  // Cambiado a booleano para coincidir con la columna
            'start_date' => ['required', 'date'],  // Usar 'date' para validación de formato de fecha
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],  // Formato de fecha y debe ser posterior a 'start_date'
            'rank_company' => ['required', 'integer', 'min:0', 'max:5'],  // Puntaje entre 0 y 5
            'rank_enviroment' => ['required', 'integer', 'min:0', 'max:5'],  // Puntaje entre 0 y 5
            'recommend' => ['required', 'boolean'],
        ];

        return $rules;
    }
}
