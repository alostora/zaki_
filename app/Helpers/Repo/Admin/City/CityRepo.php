<?php

namespace App\Helpers\Repo\Admin\City;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\File;

class CityRepo extends Repo implements RepoInterface
{

     public static $title = 'city';

     public static $createPath = 'admin/City/create';

     public static $deletePath = 'admin/City/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $cities = CitySearchRepo::searchAllCities($query_string);

          $data = [
               'data' => $cities,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/City/citiesInfo', $data);
     }
     
     public static function getCountryCities($country)
     {
          $cities = CitySearchRepo::getCountryCities($country);
          return [
               'cities' => $cities,
               'status' => $cities ? true : false,
          ];
     }

     public static function show($city)
     {
          return;
     }

     public static function create()
     {
          $data['countries'] = Country::get();
          return view('Admin/City/create', $data);
     }

     public static function store($request)
     {
          CityCreateRepo::createCity($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($city)
     {
          $data['data'] = $city;

          $data['countries'] = Country::get();

          return view('Admin/City/edit', $data);
     }

     public static function update($request, $city)
     {
          CityUpdateRepo::updateCity($request, $city);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($city)
     {
          $destinationPath = public_path('Admin_uploads/Cities/');

          File::delete($destinationPath . $city->CityFlag);

          $city->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          City::whereIn('id', $ids)->delete();

          session()->flash('warning', 'Done');

          return back();
     }
}
