<?php

namespace App\Helpers\Repo\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\File;

class BrandUpdateRepo extends BrandRepo
{
   public static function updateBrand($request, Brand $brand)
   {
      $validated = $request->validated();

      if ($request->hasFile('brandImage')) {

         $destinationPath = public_path('Admin_uploads/brands/');

         $validated['brandImage'] = $brand->brandImage;

         File::delete($destinationPath . $validated['brandImage']);

         $validated['brandImage'] = Self::imageHandle($request->file('brandImage'), $destinationPath);
      }

      $brand->update($validated);

      return $brand;
   }
}
