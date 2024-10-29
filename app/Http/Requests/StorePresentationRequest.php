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
        $rules = [
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'description' => ['required', 'string', 'max:500'],
            'firstname' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'lastname' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'card' => ['required', 'string', 'regex:/^[0-9]+$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:presentation'],
            'email_confirm' => ['required', 'email', 'same:email'],
            'country' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'state' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'city' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'address' => ['required', 'string', 'max:500'],
            'address_complement' => ['nullable', 'string', 'max:500'],
            'phone_root' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/', 'min:10', 'max:50'],
        ];

        // Agregar validaciones para redes Sociales
        foreach (['linkedin', 'facebook', 'github', 'office365', 'youtube', 'twitter', 'instagram'] as $social) {
            $rules["socialMediaData.$social.url"] = ['nullable', 'regex:/^(https?:\/\/)?(www\.)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\/\S*)?$/', 'max:255'];
            $rules["socialMediaData.$social.status"] = ['nullable', 'in:added,edited'];
            $rules["socialMediaData.$social.terms"] = ['required', 'boolean'];
            $rules["socialMediaData.$social.marketing"] = ['nullable', 'boolean'];
        }

        return $rules;
    }
}
