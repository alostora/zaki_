<?php

namespace App\Helpers\Repo\Admin\Item\ItemProperty;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Color;
use App\Models\Item;
use App\Models\ItemProperty;
use App\Models\Size;

class ItemPropertyRepo extends Repo implements RepoInterface
{

     public static $title = 'item_property';

     public static $createPath = 'admin/Item/ItemProperty/create';

     public static $deletePath = 'admin/Item/ItemProperty/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($item)
     {

          $itemProperties = ItemPropertySearchRepo::searchAllItemProperties($item);

          $data = [

               'data' => $itemProperties,

               'title' => self::$title,

               'createPath' => url(self::$createPath . '/' . $item->id),

               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Item/ItemProperty/ItemPropertiesInfo', $data);
     }

     public static function show($item)
     {
          return;
     }

     public static function create()
     {
          $item = Item::find(Request('item'));
          
          $data = [
               'sizes' => Size::where('main_type_id',$item->main_type_id)->get(),
               'colors' => Color::get(),
          ];

          return view('Admin/Item/ItemProperty/create',$data);
     }

     public static function edit($item)
     {
          return;
     }

     public static function update($request, $itemProperty)
     {
          return;
     }

     public static function store($request)
     {
          ItemPropertyCreateRepo::createItemProperty($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($itemProperty)
     {
          $itemProperty->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          ItemProperty::whereIn('id', $ids)->delete();

          session()->flash('warning', 'Done');

          return back();
     }
}
