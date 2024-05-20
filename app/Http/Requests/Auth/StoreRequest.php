<?php

namespace App\Http\Requests\Auth;

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
            'name' => ['required', 'string', 'min:4'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users', 'regex:/^(\+7|8)\d{10}$/'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
            'password' => ['required', 'min:4', 'confirmed'],
        ];
    }

    //    Не забыть!
    //    public function messages()
    //    {
    //        return [
    //            'name' => 'Поле имя обязательно для заполнения.',
    //            'name.min' => 'Поле имя должно содержать минимум 4 буквы',
    //            'email' => 'Поле почта обязательно для заполнения.',
    //            'phone' => 'Поле телефон обязательно для заполнения.',
    //            'image' => 'Поле аватарка обязательно для заполнения.',
    //            'password' => 'Поле пароль обязательно для заполнения.',
    //        ];
    //    }
}
