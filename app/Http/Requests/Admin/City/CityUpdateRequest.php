<?php

namespace App\Http\Requests\Admin\City;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
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

            'id' => 'required|max:5000',

            'cityName' => 'required|max:25',

            'cityNameAr' => 'required|max:25',

            'country_id' => ['required', 'exists:countries,id'],
        ];
    }
}
