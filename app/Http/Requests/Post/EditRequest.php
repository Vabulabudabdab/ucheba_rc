<?php

namespace App\Http\Requests\Post;

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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'time' => 'required',
        ];
    }

    public function messages() : array {
        return [
            'title.required' => 'Данное поле необходимо заполнить',
            'description.required' => 'Данное поле необходимо заполнить',
            'category_id.required' => 'Данное поле необходимо заполнить',
            'main_image.required' => 'Данное поле необходимо заполнить',
            'content.required' => 'Данное поле необходимо заполнить',
            'time.required' => 'Данное поле необходимо заполнить',
        ];
    }

}
