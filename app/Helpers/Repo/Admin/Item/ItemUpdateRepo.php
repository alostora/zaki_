<?php

namespace App\Helpers\Repo\Admin\Item;

use App\Models\Item;

class ItemUpdateRepo extends ItemRepo
{
     public static function updateItem($request, Item $item)
     {
          
        $validated = $request->validated();

        $item->update($validated);

        return $item;

     }
}
