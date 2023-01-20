<?php

namespace App\Http\Requests\Admin\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class VendorCreateRequest extends FormRequest
{
    /**
     * Determine if the vendor is authorized to make this request.
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
            'email' => 'required|unique:vendors,email,|max:100',
            'password' => 'required|max:100',
            'confirmPassword' => 'same:password',
        ];
    }
}
