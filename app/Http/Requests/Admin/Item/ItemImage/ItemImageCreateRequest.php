<?php

namespace App\Http\Requests\Admin\Item\ItemImage;

use Illuminate\Foundation\Http\FormRequest;

class ItemImageCreateRequest extends FormRequest
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

            'item_id' => ['required', 'exists:items,id'],

            'images' => ['required', 'array'],

            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:4048'],
        ];
    }
}
