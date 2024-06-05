<?php

namespace App\Helpers\Repo\Admin\MainType;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\MainType;

class MainTypeRepo extends Repo implements RepoInterface
{

     public static $title = 'main_type';

     public static $createPath = 'admin/MainType/create';

     public static $deletePath = 'admin/MainType/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $mainTypes = MainTypeSearchRepo::searchAllMainTypes($query_string);

          $data = [
               'data' => $mainTypes,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/MainType/MainTypesInfo', $data);
     }

     public static function show($mainType)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/MainType/create');
     }

     public static function store($request)
     {
          MainTypeCreateRepo::createMainType($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($mainType)
     {
          $data['data'] = $mainType;

          return view('Admin/MainType/edit', $data);
     }

     public static function update($request, $mainType)
     {
          MainTypeUpdateRepo::updateMainType($request, $mainType);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($mainType)
     {
          $mainType->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          MainType::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
