<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
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
            
            'brandName' => 'required|max:25',

            'brandNameAr' => 'required|max:25',

            'brandImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
        ];
    }
}
