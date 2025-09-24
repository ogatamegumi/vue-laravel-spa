<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'person_in_charge' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255字以内で入力してください。',
        ];
    }
}
