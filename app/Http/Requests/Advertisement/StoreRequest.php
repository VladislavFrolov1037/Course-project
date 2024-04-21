<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
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
                if ($data['type_object'] !== 'Дом' && !in_array($value, ['true', 'false'])) {
                    $fail('Поле балкон является обязательным и должно быть либо "true", либо "false".');
                }
            },

            'rental_time' => ['required', 'string'],
            'description' => ['required', 'string', 'max:700'],
            'address' => ['required', 'string', 'max:30'],
            'house_number' => ['required', 'string'],
            'district_id' => ['required', 'integer'],
            'images' => ['required', 'array', 'max:4'],
            'images.*' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'repair_type_id.required' => 'Поле тип ремонта обязательно для заполнения.',
            'repair_type_id.integer' => 'Поле тип ремонта должно быть целым числом.',
            'num_rooms.required' => 'Поле количество комнат обязательно для заполнения.',
            'num_rooms.integer' => 'Поле количество комнат должно быть целым числом.',
            'num_floors.required' => 'Поле количество этажей обязательно для заполнения.',
            'num_floors.integer' => 'Поле количество этажей должно быть целым числом.',
            'floor.required' => 'Поле этаж обязательно для заполнения.',
            'floor.integer' => 'Поле этаж должно быть целым числом.',
            'square.required' => 'Поле площадь обязательно для заполнения.',
            'square.integer' => 'Поле площадь должно быть целым числом.',
            'price.required' => 'Поле цена обязательно для заполнения.',
            'price.integer' => 'Поле цена должно быть целым числом.',
            'type_object.required' => 'Поле тип объекта обязательно для заполнения.',
            'type_object.string' => 'Поле тип объекта должно быть строкой.',
            'balcony.required' => 'Поле балкон обязательно для заполнения.',
            'balcony.string' => 'Поле балкон должно быть строкой.',
            'rental_time.required' => 'Поле срок аренды обязательно для заполнения.',
            'rental_time.string' => 'Поле срок аренды должно быть строкой.',
            'description.required' => 'Поле описание обязательно для заполнения.',
            'description.string' => 'Поле описание должно быть строкой.',
            'status_id.default' => 'Неверное значение для статуса.',

            'address.required' => 'Поле улица обязательно для заполнения.',
            'address.string' => 'Поле улица должно быть строкой.',
            'house_number.required' => 'Поле номер дома обязательно для заполнения.',
            'house_number.integer' => 'Поле номер дома должно быть целым числом.',
            'district_id.required' => 'Поле район обязательно для заполнения.',
            'images.required' => 'Необходимо загрузить изображения.',
            'images.array' => 'Поле изображения должно быть массивом.',
            'images.max' => 'Максимальное количество изображений - :max.',
            'images.*.image' => 'Все файлы изображений должны быть изображениями.',
            'images.*.mimes' => 'Форматы файлов изображений могут быть только jpeg, jpg или png.',
            'images.*.max' => 'Максимальный размер файла изображения - :max КБ.',
        ];
    }
}
