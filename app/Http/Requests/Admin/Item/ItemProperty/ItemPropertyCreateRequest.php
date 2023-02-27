<?php

namespace App\Http\Requests\Admin\Item\ItemProperty;

use Illuminate\Foundation\Http\FormRequest;

class ItemPropertyCreateRequest extends FormRequest
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

            'size_id' => ['required', 'exists:sizes,id'],

            'color_id' => ['required', 'exists:colors,id'],

            'quantity' => ['required', 'integer','max:1000'],
        ];
    }
}
