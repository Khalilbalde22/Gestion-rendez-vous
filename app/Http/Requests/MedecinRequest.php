<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedecinRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>['nulablle','min:4'],
            'prenom'=>['nullable','min:4'],
            'email'=>['required','email','unique:medecins'],
            'adresse'=>['nullable'|'min:3'],
            'lieu'=>['nullable'|'min:3'],
            'telephone'=>['nullable'],
            'image'=>['nullable'],
        ];
    }
}
