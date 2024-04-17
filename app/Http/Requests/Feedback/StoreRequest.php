<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    protected $errorBag = 'feedback';
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
            'email' => ['required', 'email', 'unique:feedback_requests', 'string'],
            'message' => ['required', 'string', 'regex:/([\p{L}\d]+\s+){1}[\p{L}\d]+/u']
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Поле сообщение обязательно для заполнения',
            'message.regex' => 'Поле сообщение должно содержать минимум 2 слова',
        ];
    }
}
