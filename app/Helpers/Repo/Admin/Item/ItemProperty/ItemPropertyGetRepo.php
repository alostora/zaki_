<?php

namespace App\Helpers\Repo\Admin\Item\ItemProperty;

use App\Models\Item;
use App\Models\ItemProperty;

class ItemPropertyGetRepo extends ItemPropertyRepo
{
     public static function allItemProperties(Item $item) {
          
          return ItemProperty::where('item_id',$item->id)->orderBy('id', 'DESC');
     }
}
