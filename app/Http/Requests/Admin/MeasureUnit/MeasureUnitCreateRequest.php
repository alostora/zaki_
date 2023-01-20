<?php

namespace App\Http\Requests\Admin\MeasureUnit;

use Illuminate\Foundation\Http\FormRequest;

class MeasureUnitCreateRequest extends FormRequest
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
            "unitName" => "required|max:20",
            "unitNameAr" => "required|max:20",
            "unitCode" => "required|max:10",
            "unitType" => "required|max:10",
        ];
    }
}
