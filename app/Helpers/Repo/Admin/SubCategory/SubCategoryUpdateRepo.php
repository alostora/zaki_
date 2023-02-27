<?php

namespace App\Helpers\Repo\Admin\SubCategory;

use App\Models\SubCategory;
use Illuminate\Support\Facades\File;

class SubCategoryUpdateRepo extends SubCategoryRepo
{
   public static function updateSubCategory($request, SubCategory $subCategory)
   {
      $validated = $request->validated();

      $destinationPath = public_path('Admin_uploads/subCategories/');

      if ($request->hasFile('subCategoryImage')) {

         $validated['subCategoryImage'] = $subCategory->subCategoryImage;

         File::delete($destinationPath . $validated['subCategoryImage']);

         $validated['subCategoryImage'] = Self::imageHandle($request->subCategoryImage, $destinationPath);
      }

      $subCategory->update($validated);

      return $subCategory;
   }
}
