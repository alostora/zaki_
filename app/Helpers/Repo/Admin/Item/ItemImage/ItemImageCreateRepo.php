<?php

namespace App\Helpers\Repo\Admin\Item\ItemImage;

use App\Models\Item;

class ItemImageCreateRepo extends ItemImageRepo
{
     public static function createItemImage($request)
     {
          $validated = $request->validated();

          $destinationPath = public_path('Admin_uploads/items/');

          $data = [];

          foreach($validated['images'] as $image){

               $data[] = [
                    'imageName' => Self::imageHandle($image, $destinationPath),
                    'item_id' => $validated['item_id'],
               ];
          }

          $item = Item::find($validated['item_id']);

          return $item->itemImages()->createMany($data);
     }
}
