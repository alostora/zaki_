<?php

namespace App\Http\Requests\Admin\State;

use Illuminate\Foundation\Http\FormRequest;

class StateCreateRequest extends FormRequest
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

            'stateName' => 'required|max:25',

            'stateNameAr' => 'required|max:25',

            'country_id' => ['required', 'exists:countries,id'],

            'city_id' => ['required', 'exists:cities,id'],
        ];
    }
}
