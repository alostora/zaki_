<?php

namespace App\Helpers\Repo\Admin\SubCategory;

use App\Models\SubCategory;

class SubCategoryCreateRepo extends SubCategoryRepo
{
     public static function createSubCategory($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/subCategories/');

          $validated['subCategoryImage'] = Self::imageHandle($request->file('subCategoryImage'), $destinationPath);

          return SubCategory::create($validated);
     }
}
