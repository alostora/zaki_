<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryCreateRequest extends FormRequest
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

            'subCategoryName' => 'required|max:100',

            'subCategoryNameAr' => 'required|max:100',

            'subCategoryImage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',

            'category_id' => ['required','max:100','exists:categories,id'],
        ];
    }
}
