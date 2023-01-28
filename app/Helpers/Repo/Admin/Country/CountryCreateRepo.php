<?php

namespace App\Helpers\Repo\Admin\Country;

use App\Models\Country;

class CountryCreateRepo extends CountryRepo
{
     public static function createCountry($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/countries/');

          $validated['countryFlag'] = Self::imageHandle($request->file('countryFlag'), $destinationPath);

          return Country::create($validated);
     }
}
