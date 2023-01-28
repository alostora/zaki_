<?php

namespace App\Helpers\Repo\Admin\Category;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Category;
use App\Models\MainType;
use Illuminate\Support\Facades\File;

class CategoryRepo extends Repo implements RepoInterface
{

     public static $title = 'category';

     public static $createPath = 'admin/Category/create';

     public static $deletePath = 'admin/Category/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $categories = CategorySearchRepo::searchAllCategorys($query_string);

          $data = [
               'data' => $categories,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Category/CategoriesInfo', $data);
     }

     public static function show($category)
     {
          return;
     }

     public static function create()
     {
          $data['types'] = MainType::get();
          return view('Admin/Category/create', $data);
     }

     public static function store($request)
     {
          CategoryCreateRepo::createCategory($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($category)
     {
          $data['data'] = $category;

          $data['types'] = MainType::get();

          return view('Admin/Category/edit', $data);
     }

     public static function update($request, $category)
     {
          CategoryUpdateRepo::updateCategory($request, $category);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($category)
     {
          $destinationPath = public_path('Admin_uploads/categories/');

          File::delete($destinationPath . $category->categoryImage);

          $category->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          $categories = Category::whereIn('id', $ids)->get();

          $destinationPath = public_path('Admin_uploads/categories/');

          foreach ($categories as $category) {

               File::delete($destinationPath . $category->categoryImage);

               $category->delete();
          }

          session()->flash('warning', 'Done');

          return back();
     }
}
