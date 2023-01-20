<?php

namespace App\Helpers\Repo\Admin\Vendor;

use App\Models\Vendor;

class VendorCreateRepo extends VendorRepo
{
     public static function createVendor($request)
     {
          $validated = $request->validated();

          return Vendor::create($validated);
     }
}
