<?php

namespace App\Helpers\Repo\Admin\Color;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Color;

class ColorRepo extends Repo implements RepoInterface
{

     public static $title = 'color';

     public static $createPath = 'admin/Color/create';

     public static $deletePath = 'admin/Color/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $colors = ColorSearchRepo::searchAllColors($query_string);

          $data = [
               'data' => $colors,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Color/colorsInfo', $data);
     }

     public static function show($color)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Color/create');
     }

     public static function store($request)
     {
          ColorCreateRepo::createColor($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($color)
     {
          $data['data'] = $color;

          return view('Admin/Color/edit', $data);
     }

     public static function update($request, $color)
     {
          ColorUpdateRepo::updateColor($request, $color);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($color)
     {
          $color->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Color::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
