<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'siteName' => 'required|max:20',

            'siteNameAr' => 'required|max:20',

            'siteEmail' => 'email|max:50',

            'siteMobile' => 'max:20',

            'sitePhone' => 'max:20',

            'siteDesc' => 'max:500',

            'siteDescAr' => 'max:500',

            'siteImage' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',

            'siteLogo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4048',

        ];
    }
}
