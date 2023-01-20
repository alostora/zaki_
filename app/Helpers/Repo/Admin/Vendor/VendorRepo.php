<?php

namespace App\Helpers\Repo\Admin\Vendor;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Vendor;

class VendorRepo extends Repo implements RepoInterface
{

     public static $title = 'vendor';

     public static $createPath = 'admin/Vendor/create';

     public static $deletePath = 'admin/Vendor/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $vendors = VendorSearchRepo::searchAllVendors($query_string);

          $data = [
               'data' => $vendors,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Vendor/VendorsInfo', $data);
     }

     public static function show($vendor)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Vendor/create');
     }

     public static function store($request)
     {
          VendorCreateRepo::createVendor($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($vendor)
     {
          $data['data'] = $vendor;

          return view('Admin/Vendor/edit', $data);
     }

     public static function update($request, $vendor)
     {
          VendorUpdateRepo::updateVendor($request, $vendor);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($vendor)
     {
          $vendor->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Vendor::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
