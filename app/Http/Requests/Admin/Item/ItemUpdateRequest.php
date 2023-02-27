<?php

namespace App\Http\Requests\Admin\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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

            'itemName' => 'required|max:100',

            'itemNameAr' => 'required|max:100',

            'itemDesc' => 'required|max:1000',

            'itemDescAr' => 'required|max:1000',

            'itemPrice' => 'required|numeric|max:100000000',

            'itemCount' => 'required|numeric|max:100000',

            'itemDiscount' => 'required|numeric|between:0,1',

            'country_id' => ['required', 'max:100', 'exists:countries,id'],

            'sub_category_id' => ['required', 'max:100', 'exists:sub_categories,id'],

        ];
    }
}
