<?php

namespace App\Helpers\Repo\Admin\Brand;

use App\Models\Brand;

class BrandCreateRepo extends BrandRepo
{
     public static function createBrand($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/brands/');

          $validated['brandImage'] = Self::imageHandle($request->file('brandImage'), $destinationPath);

          return Brand::create($validated);
     }
}
