<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'repair_type' => ['required', 'string'],
            'num_rooms' => ['required', 'integer', 'min:1'],
            'num_floors' => ['required', 'integer', 'min:1'],
            'floor' => function ($attribute, $value, $fail) {
                $data = $this->all();
                if ($data['type_object'] !== 'Дом' && empty($value)) {
                    $fail('Поле этаж является обязательным.');
                }
            },
            'square' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:1'],
            'type_object' => ['required', 'string'],

            'balcony' => function ($attribute, $value, $fail) {
                $data = $this->all();
                if ($data['type_object'] !== 'Дом' && ! in_array($value, ['1', '0'])) {
                    $fail('Поле балкон является обязательным');
                }
            },

            'status_id' => ['required', 'integer'],
            'user_id' => auth()->user(),
            'rental_time' => ['required', 'string'],
            'description' => ['required', 'string', 'max:700'],
            'address' => ['required', 'string', 'max:30'],
            'house_number' => ['required', 'string'],
            'district_id' => ['required', 'integer'],
            'images' => ['nullable', 'array', 'max:4'],
            'images.*' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }
}
