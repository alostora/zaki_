<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\MainType;
use App\Models\SubCategory;

class Categories extends Controller
{


  public function mainTyps(){

    $type = isset($_GET['type']) ? $_GET['type'] : null;



    $types = MainType::where(function($q) use ($type){
      if($type != null){

        $q->where('typeName',$type);
      }
    })->get();
    $data['status'] = true;
    $data['types'] = $types->makeHidden('operations');
    return $data;
  }





  public function categories($type_id){
    $categories = Category::where('type_id',$type_id)->get();
    $data['status'] = true;
    $data['categories'] = $categories->makeHidden(['image_url','operations'])->makeVisible(['image_path','type_id']);
    return $data;
  }





  public function subCategories($cat_id){
    $categories = SubCategory::where('category_id',$cat_id)->get();
    $data['status'] = true;
    $data['sub_categories'] = $categories->makeHidden(['image_url','operations'])->makeVisible('image_path');
    return $data;
  }




  public function items($sub_cat_id){
    $items = Item::where('sub_cat_id',$sub_cat_id)->get();
    $data['status'] = true;
    $data['items'] = $items->makeHidden(['image_url','operations'])->makeVisible('image_path');
    return $data;
  }




}
