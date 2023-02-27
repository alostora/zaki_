<?php

namespace App\Helpers\Repo\Admin\Item;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Country;
use App\Models\Item;
use App\Models\SubCategory;

class ItemRepo extends Repo implements RepoInterface
{

     public static $title = 'item';

     public static $createPath = 'admin/Item/create';

     public static $deletePath = 'admin/Item/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $items = ItemSearchRepo::searchAllItems($query_string);

          $data = [
               'data' => $items,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Item/ItemsInfo', $data);
     }

     public static function show($item)
     {
          return;
     }

     public static function create()
     {
          $data['countries'] = Country::get();

          $data['sub_categories'] = SubCategory::get();

          return view('Admin/Item/create', $data);
     }

     public static function store($request)
     {
          ItemCreateRepo::createItem($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($item)
     {
          $data['countries'] = Country::get();

          $data['sub_categories'] = SubCategory::get();

          $data['data'] = $item;

          return view('Admin/Item/edit', $data);
     }

     public static function update($request, $item)
     {
          ItemUpdateRepo::updateItem($request, $item);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($item)
     {
          $item->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Item::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
