<?php

namespace App\Http\Requests\Admin\Vendor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VendorUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            "id" => "nullable",
            "name" => "required|max:100",
            'email' => 'required|unique:vendors,email,' . $request->id . '|max:100',
            'password' => 'nullable|max:100',
            'confirmPassword' => 'same:password',
        ];
    }
}
