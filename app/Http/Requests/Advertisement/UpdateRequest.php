<?php

namespace App\Http\Requests\Advertisement;

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
            'house_number' => 'required|integer',
            'description' => 'required|string',
//            'image' => ['required', 'regex:/^.+\.(jpe?g|png)$/i'],
            'price' => 'required|integer',
            'square' => 'required|integer',
            'floor' => 'required|integer',
            'num_floors' => 'required|integer',
            'balcony' => 'required|string',
            'rental_time_id' => 'required|integer',
            'num_rooms' => 'required|integer',
            'repair_type_id' => 'required|integer',
            'district_id' => 'required|integer',
            'type_object_id' => 'required|integer',
        ];
    }
}
