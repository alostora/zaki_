<?php

namespace App\Helpers\Repo\Admin\SubCategory;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MainType;
use Illuminate\Support\Facades\File;

class SubCategoryRepo extends Repo implements RepoInterface
{

     public static $title = 'subcategory';

     public static $createPath = 'admin/SubCategory/create';

     public static $deletePath = 'admin/SubCategory/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $categories = SubCategorySearchRepo::searchAllSubCategorys($query_string);

          $data = [
               'data' => $categories,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/SubCategory/subCategoriesInfo', $data);
     }

     public static function show($subcategory)
     {
          return;
     }

     public static function create()
     {
          $data['categories'] = Category::get();
          return view('Admin/SubCategory/create', $data);
     }

     public static function store($request)
     {
          SubCategoryCreateRepo::createSubCategory($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($subcategory)
     {
          $data['data'] = $subcategory;

          $data['categories'] = Category::get();

          return view('Admin/SubCategory/edit', $data);
     }

     public static function update($request, $subcategory)
     {
          SubCategoryUpdateRepo::updateSubCategory($request, $subcategory);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($subcategory)
     {
          $destinationPath = public_path('Admin_uploads/categories/');

          File::delete($destinationPath . $subcategory->subcategoryImage);

          $subcategory->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $categories = SubCategory::whereIn('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/categories/');

          foreach ($categories as $subcategory) {

               File::delete($destinationPath . $subcategory->subcategoryImage);

               $subcategory->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
