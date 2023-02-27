<?php

namespace App\Helpers\Repo\Admin\Item\ItemImage;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\ItemImage;
use Illuminate\Support\Facades\File;

class ItemImageRepo extends Repo implements RepoInterface
{

     public static $title = 'itemImage';

     public static $createPath = 'admin/Item/ItemImage/create';

     public static $deletePath = 'admin/Item/ItemImage/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($item)
     {

          $itemImages = ItemImageSearchRepo::searchAllItemImages($item);

          $data = [

               'data' => $itemImages,

               'title' => self::$title,

               'createPath' => url(self::$createPath.'/'.$item->id),

               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Item/ItemImage/ItemImagesInfo', $data);
     }

     public static function show($item)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Item/ItemImage/create');
     }

     public static function edit($item)
     {
          return;
     }

     public static function update($request, $itemImage)
     {
          return;
     }

     public static function store($request)
     {
          ItemImageCreateRepo::createItemImage($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($itemImage)
     {
          $destinationPath = public_path('Admin_uploads/items/');

          File::delete($destinationPath . $itemImage->imageName);

          $itemImage->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $itemImages = ItemImage::whereIn('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/items/');

          foreach ($itemImages as $item) {

               File::delete($destinationPath . $item->imageName);

               $item->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
