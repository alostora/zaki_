<?php

namespace App\Helpers\Repo\Admin\Item\ItemImage;

use App\Models\Item;

class ItemImageSearchRepo extends ItemImageRepo
{

     public static function searchAllItemImages(Item $item) {
          
          return ItemImageGetRepo::allItemImages($item)->get();
     }
}
