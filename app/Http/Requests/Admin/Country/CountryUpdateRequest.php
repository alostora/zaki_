<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends FormRequest
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
            
            'countryName' => 'required|max:25',

            'countryNameAr' => 'required|max:25',

            'countryPhoneKey' => 'required|max:5',

            'countryCode' => 'required|max:10',

            'countryCurrency' => 'required|max:10',

            'countryFlag' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',
        ];
    }
}
