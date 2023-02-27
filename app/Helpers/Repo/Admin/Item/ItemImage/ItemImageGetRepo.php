<?php

namespace App\Helpers\Repo\Admin\Item\ItemImage;

use App\Models\Item;
use App\Models\ItemImage;

class ItemImageGetRepo extends ItemImageRepo
{
     public static function allItemImages(Item $item) {
          
          return ItemImage::where('item_id',$item->id)->orderBy('id', 'DESC');
     }
}
