<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:200',
            'phone' => 'nullable|string|max:30',
            'service' => 'required|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|min:20|max:3000',
            'website' => 'nullable', // honeypot
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Votre nom est requis.',
            'email.required' => 'L\'adresse email est requise.',
            'email.email' => 'Veuillez saisir un email valide.',
            'service.required' => 'Veuillez sélectionner un service.',
            'message.required' => 'Votre message est requis.',
            'message.min' => 'Votre message doit contenir au moins 20 caractères.',
        ];
    }
}