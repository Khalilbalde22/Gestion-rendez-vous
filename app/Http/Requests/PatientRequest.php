<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'nom'=>['required','min:4'],
            'prenom'=>['required','min:4'],
            'email'=>['required','email'],
            'adresse'=>['required','min:3'],
            'lieu'=>['required','min:3'],
            'telephone'=>['required'],
            'image'=>['required'],
            'user_id'=>['nullable'],
        ];

    }
}
