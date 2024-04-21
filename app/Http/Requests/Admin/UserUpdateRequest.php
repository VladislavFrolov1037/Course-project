<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'phone' => ['required', Rule::unique('users')->ignore($userId), 'regex:/^(\+7|8)\d{10}$/'],
            'image' => ['mimes:jpg,png,jpeg', 'max:2048'],
            'role' => ['required', 'string', 'in:admin,user'],
        ];
    }
}
