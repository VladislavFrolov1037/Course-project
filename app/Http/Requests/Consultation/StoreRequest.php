<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    protected $errorBag = 'consultation';

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
        $rules = [
            'name' => ['required', 'string', 'min:4'],
            'consultation_email' => ['required', 'email'],
            'phone' => ['required', 'string', 'regex:/^(\+7|8)\d{10}$/'],
        ];

        if (isset($rules['consultation_email'])) {
            $emailRules = $rules['consultation_email'];
            unset($rules['consultation_email']);
            $rules['email'] = $emailRules;
        }

        return $rules;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email' => $this->input('consultation_email'),
        ]);
    }
}
