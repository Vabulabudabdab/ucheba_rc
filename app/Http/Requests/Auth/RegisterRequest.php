<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'password_confirm' => 'required|string|same:password',
            'remember' => 'nullable'
        ];
    }

    public function messages() : array {
        return [
            'email.required' => 'Данное поле обязательное',
            'email.unique' => 'Данная эл.почта занята',
            'email.max' => 'Максимальное кол-во символов: 255',
            'password.required' => 'Данное поле обязательное',
            'password_confirm.same' => "Подтвердите пароль!",
            'password_confirm.required' => "Данное поле обязательное"
        ];
    }
}
