<?php

namespace App\Helpers\Repo\Admin\Item\ItemProperty;

use App\Models\Item;

class ItemPropertySearchRepo extends ItemPropertyRepo
{

     public static function searchAllItemProperties(Item $item) {
          
          return ItemPropertyGetRepo::allItemProperties($item)->get();
     }
}
