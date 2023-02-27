<?php

namespace App\Helpers\Repo\Admin\Item;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;

class ItemCreateRepo extends ItemRepo
{
     public static function createItem($request)
     {
          $validated = $request->validated();
          $category_id = SubCategory::find($validated['sub_category_id'])->category_id;
          $category = Category::find($category_id)->category_id;
          $validated['main_type_id'] = $category->type_id;

          return Item::create($validated);
     }
}
