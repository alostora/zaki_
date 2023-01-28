<?php

namespace App\Helpers\Repo\Admin\Category;

use App\Models\Category;

class CategoryCreateRepo extends CategoryRepo
{
     public static function createCategory($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/categories/');

          $validated['categoryImage'] = Self::imageHandle($request->file('categoryImage'), $destinationPath);

          return Category::create($validated);
     }
}
