<?php

namespace App\Helpers\Repo\Admin\Size;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\MainType;
use App\Models\Size;

class SizeRepo extends Repo implements RepoInterface
{

     public static $title = 'size';

     public static $createPath = 'admin/Size/create';

     public static $deletePath = 'admin/Size/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $sizes = SizeSearchRepo::searchAllSizes($query_string);

          $data = [
               'data' => $sizes,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Size/SizesInfo', $data);
     }

     public static function show($size)
     {
          return;
     }

     public static function create()
     {
          $data['types'] = MainType::get();

          return view('Admin/Size/create', $data);
     }

     public static function store($request)
     {
          SizeCreateRepo::createSize($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($size)
     {
          $data['data'] = $size;
          $data['types'] = MainType::get();

          return view('Admin/Size/edit', $data);
     }

     public static function update($request, $size)
     {
          SizeUpdateRepo::updateSize($request, $size);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($size)
     {
          $size->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Size::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
