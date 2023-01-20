<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" => "nullable",
            "name" => "required|max:100",
            'email' => 'required|unique:users,email,|max:100',
            'password' => 'required|max:100',
            'confirmPassword' => 'same:password',
        ];
    }
}
