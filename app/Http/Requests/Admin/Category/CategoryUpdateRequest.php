<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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

            'categoryName' => 'required|max:100',

            'categoryNameAr' => 'required|max:100',

            'categoryImage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
            
            'type_id' => ['required','max:100','exists:main_types,id'],
        ];
    }
}
