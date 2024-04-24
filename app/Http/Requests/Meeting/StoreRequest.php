<?php

namespace App\Http\Requests\Meeting;

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
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'date' => ['required', 'date', 'after:today', 'before_or_equal:' . date('Y-m-d', strtotime('+1 year'))],
            'time' => ['required', 'date_format:H:i'],
            'advertisement_id' => ['required'],
        ];
    }
}
