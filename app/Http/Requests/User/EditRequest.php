<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email, ' . $this->user_id,
            'password' => 'nullable|string',
            'role_id' => 'required|integer',
        ];
    }

    public function messages(): array {
        return [
            'email.required' => 'Данное поле обязательное',
            'password.nullable' => 'Данное поле обязательное',
            'role_id.required' => 'Данное поле обязательное',
        ];
    }
}
