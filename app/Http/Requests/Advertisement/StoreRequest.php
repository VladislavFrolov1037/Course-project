<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'repair_type_id' => 'required|integer',
            'num_rooms' => 'required|integer',
            'num_floors' => 'required|integer',
            'floor' => 'required|integer',
            'square' => 'required|integer',
            'price' => 'required|integer',
            'type_object' => 'required|string',
            'balcony' => 'required|string',
            'rental_time' => 'required|string',
            'description' => 'required|string',
            'status_id' => ['default:1'],
//            'image' => ['required', 'regex:/^.+\.(jpe?g|png)$/i'],
        ];
    }
}
