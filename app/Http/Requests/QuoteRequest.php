<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:200',
            'service' => 'required|string|max:100',
            'budget' => 'required|string|max:100',
            'deadline' => 'nullable|date|after:today',
            'details' => 'required|string|min:50|max:5000',
            'website' => 'nullable', // honeypot
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Votre nom est requis.',
            'email.email' => 'Veuillez saisir un email valide.',
            'phone.required' => 'Votre téléphone est requis.',
            'service.required' => 'Veuillez sélectionner un service.',
            'budget.required' => 'Veuillez indiquer un budget.',
            'details.required' => 'Veuillez décrire votre projet.',
            'details.min' => 'Veuillez fournir plus de détails (min. 50 caractères).',
        ];
    }
}