<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreneauRequest extends FormRequest
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
            'date_debut'=>['required'],
            'date_fin'=>['required'],
            'heur_debut'=>['required'],
            'heur_fin'=>['required'],
            'duree'=>['required'],
            'lieu'=>['required','min:3'],
            'user_id'=>['nullable'],
            'patients_id'=>['nullable'],
        ];
    }
}
