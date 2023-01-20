<?php

namespace App\Http\Requests\Admin\Size;

use Illuminate\Foundation\Http\FormRequest;

class SizeUpdateRequest extends FormRequest
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
            'id' => 'max:5000',
            "sizeName" => "required|max:15",
            "sizeNameAr" => "required|max:15",
            "sizeValue" => "required|max:100",
            "type_id" => "required|max:100",
        ];
    }
}
