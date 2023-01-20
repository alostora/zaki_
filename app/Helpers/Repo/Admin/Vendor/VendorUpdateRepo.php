<?php

namespace App\Helpers\Repo\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class VendorUpdateRepo extends VendorRepo
{
   public static function updateVendor($request, Vendor $vendor)
   {
      $validated = $request->validated();

      if ($validated['password'] == null) {

         unset($validated['password']);
      } else {

         $validated['password'] = Hash::make($validated['password']);
      }

      $vendor->update($validated);

      return $vendor;
   }
}
