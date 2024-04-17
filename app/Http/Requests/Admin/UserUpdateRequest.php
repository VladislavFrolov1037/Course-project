<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
            'phone' => ['required', Rule::unique('users')->ignore(auth()->id()), 'regex:/^(\+7|8)\d{10}$/'],
            'role' => ['required', 'string', 'in:admin,user'],
        ];
    }
}
