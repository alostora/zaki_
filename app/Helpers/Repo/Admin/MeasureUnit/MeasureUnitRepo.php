<?php

namespace App\Helpers\Repo\Admin\MeasureUnit;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\MeasureUnit;

class MeasureUnitRepo extends Repo implements RepoInterface
{

     public static $title = 'measureUnit';

     public static $createPath = 'admin/MeasureUnit/create';

     public static $deletePath = 'admin/MeasureUnit/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $measureUnits = MeasureUnitSearchRepo::searchAllMeasureUnits($query_string);

          $data = [
               'data' => $measureUnits,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/MeasureUnit/MeasureUnitsInfo', $data);
     }

     public static function show($measureUnit)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/MeasureUnit/create');
     }

     public static function store($request)
     {
          MeasureUnitCreateRepo::createMeasureUnit($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($measureUnit)
     {
          $data['data'] = $measureUnit;

          return view('Admin/MeasureUnit/edit', $data);
     }

     public static function update($request, $measureUnit)
     {
          MeasureUnitUpdateRepo::updateMeasureUnit($request, $measureUnit);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($measureUnit)
     {
          $measureUnit->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          MeasureUnit::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
