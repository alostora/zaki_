<?php

namespace App\Helpers\Repo\Admin\Item;


class ItemSearchRepo extends ItemRepo
{

     public static function searchAllItems(
          $query_string = -1
     ) {

          return ItemGetRepo::allItems($query_string)->get();
     }
}
