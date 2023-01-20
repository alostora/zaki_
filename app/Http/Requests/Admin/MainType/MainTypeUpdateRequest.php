<?php

namespace App\Http\Requests\Admin\MainType;

use Illuminate\Foundation\Http\FormRequest;

class MainTypeUpdateRequest extends FormRequest
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
            'typeName' => 'required|max:100',
            'typeNameAr' => 'required|max:100',
        ];
    }
}
