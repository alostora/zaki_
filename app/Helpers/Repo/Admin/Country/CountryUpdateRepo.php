<?php

namespace App\Helpers\Repo\Admin\Country;

use App\Models\Country;
use Illuminate\Support\Facades\File;

class CountryUpdateRepo extends CountryRepo
{
   public static function updateCountry($request, Country $country)
   {
      $validated = $request->validated();

      if ($request->hasFile('countryFlag')) {

         $destinationPath = public_path('Admin_uploads/countries/');

         $validated['countryFlag'] = $country->countryFlag;

         File::delete($destinationPath . $validated['countryFlag']);

         $validated['countryFlag'] = Self::imageHandle($request->file('countryFlag'), $destinationPath);
      }

      $country->update($validated);

      return $country;
   }
}
