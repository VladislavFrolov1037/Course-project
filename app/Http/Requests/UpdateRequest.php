<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return [
            'address' => 'required|string',
            'description' => 'required|string',
            'image' => ['required', 'regex:/^.+\.(jpe?g|png)$/i'],
            'price' => 'required|integer',
            'square' => 'required|integer',
            'floor' => 'required|integer',
            'num_floors' => 'required|integer',
            'city' => 'required|string',
            'time_of_agreement' => 'required|string',
            'balcony' => 'required|string',
            'num_rooms' => 'required|integer',
            'phone' => ['required', 'regex:/^(\+7|8)[\s\-]?\(?\d{3}\)?[\s\-]?\d{3}[\s\-]?\d{2}[\s\-]?\d{2}$/'],
        ];
    }
}
