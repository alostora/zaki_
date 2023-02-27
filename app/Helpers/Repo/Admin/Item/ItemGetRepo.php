<?php

namespace App\Helpers\Repo\Admin\Item;

use App\Models\Item;

class ItemGetRepo extends ItemRepo
{
     public static function allItems(
          $query_string = -1
     ) {
          return Item::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('itemName', 'like', '%' . $query_string . '%')

                         ->orWhere('itemNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
