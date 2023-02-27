<?php

namespace App\Helpers\Repo\Admin\Item\ItemProperty;

use App\Models\ItemProperty;

class ItemPropertyCreateRepo extends ItemPropertyRepo
{
     public static function createItemProperty($request)
     {
          $validated = $request->validated();

          return ItemProperty::create($validated);
     }
}
