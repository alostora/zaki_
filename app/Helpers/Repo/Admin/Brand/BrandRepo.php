<?php

namespace App\Helpers\Repo\Admin\Brand;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class BrandRepo extends Repo implements RepoInterface
{

     public static $title = 'brand';

     public static $createPath = 'admin/Brand/create';

     public static $deletePath = 'admin/Brand/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $brands = BrandSearchRepo::searchAllBrands($query_string);

          $data = [
               'data' => $brands,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Brand/brandsInfo', $data);
     }

     public static function show($brand)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Brand/create');
     }

     public static function store($request)
     {
          BrandCreateRepo::createBrand($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($brand)
     {
          $data['data'] = $brand;

          return view('Admin/Brand/edit', $data);
     }

     public static function update($request, $brand)
     {
          BrandUpdateRepo::updateBrand($request, $brand);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($brand)
     {
          $destinationPath = public_path('Admin_uploads/brands/');

          File::delete($destinationPath . $brand->brandImage);

          $brand->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $brands = Brand::whereIn('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/brands/');

          foreach ($brands as $brand) {

               File::delete($destinationPath . $brand->brandImage);

               $brand->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
