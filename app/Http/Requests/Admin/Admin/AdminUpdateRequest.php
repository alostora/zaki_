<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            "id" => "nullable|integer",
            "name" => "required|string|max:100",
            'email' => 'required|unique:admins,email,'.$request->id.'|max:100',
            'password' => 'max:100',
            'confirmPassword' => 'same:password',
            'permission_id' => 'required|integer',
        ];
    }
}
