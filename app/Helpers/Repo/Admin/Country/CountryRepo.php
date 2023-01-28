<?php

namespace App\Helpers\Repo\Admin\Country;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Country;
use Illuminate\Support\Facades\File;

class CountryRepo extends Repo implements RepoInterface
{

     public static $title = 'country';

     public static $createPath = 'admin/Country/create';

     public static $deletePath = 'admin/Country/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $countries = CountrySearchRepo::searchAllCountries($query_string);

          $data = [
               'data' => $countries,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Country/CountriesInfo', $data);
     }

     public static function show($country)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Country/create');
     }

     public static function store($request)
     {
          CountryCreateRepo::createCountry($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($country)
     {
          $data['data'] = $country;

          return view('Admin/Country/edit', $data);
     }

     public static function update($request, $country)
     {
          CountryUpdateRepo::updateCountry($request, $country);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($country)
     {
          $destinationPath = public_path('Admin_uploads/countries/');

          File::delete($destinationPath . $country->countryFlag);

          $country->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $countries = Country::whereIn('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/countries/');

          foreach ($countries as $country) {

               File::delete($destinationPath . $country->countryFlag);

               $country->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
