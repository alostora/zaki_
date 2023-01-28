<?php

namespace App\Helpers\Repo\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryUpdateRepo extends CategoryRepo
{
   public static function updateCategory($request, Category $category)
   {
      $validated = $request->validated();

      if ($request->hasFile('categoryImage')) {

         $destinationPath = public_path('Admin_uploads/categories/');

         $validated['categoryImage'] = $category->categoryImage;

         File::delete($destinationPath . $validated['categoryImage']);

         $validated['categoryImage'] = Self::imageHandle($request->file('categoryImage'), $destinationPath);
      }

      $category->update($validated);

      return $category;
   }
}
