<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresentationRequest extends FormRequest
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
        return [
            'photo' => ['nullable|image|mimes:jpg,jpeg,png|max:2048'], // formato imagen y que no supere los 2 mb
            'description'=>['required|string|max:500'],
            'name' => ['required|string|max:255|regex:/^[\pL\s]+$/u'], // Letras y espacios
            'lastname' => ['required|string|max:255|regex:/^[\pL\s]+$/u'], // Letras y espacios
            'card' => ['required|string|regex:/^[0-9]+$/|max:20'],
            'email' => ['required|string|email|max:255|unique:presentation'], // Email único          
            'email_confirm' => ['required', 'same:email'],
            'country'=>['required|string|max:255|regex:/^[\pL\s]+$/u'],//solo letras
            'state'=>['required|string|max:255|regex:/^[\pL\s]+$/u'], // solo letras
            'city'=>['required|string|max:255|regex:/^[\pL\s]+$/u'],// solo letras
            'address'=>['required|string|max:500'],
            'address_complement'=>['nullable|string|max:500'],
            'phoneRoot'=>['nullable|string|min:10|max:50'], // indicativo              
            'phone' => ['nullable|string|regex:/^[0-9]+$/|min:10|max:50'], //Solo numeros de teléfonos                        
        ];
    }
}
