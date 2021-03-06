<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'itemName',
        'itemNameAr',
        'itemDesc',
        'itemDescAr',
        'itemPrice',
        'itemCount',
        'itemDiscount',
        'active',
        'cat_id',
        'sub_cat_id',
        'country_id',
        "type_id",//same size type in sizes & category table
        
    ];



    protected $hidden = [
        'itemName',
        'itemNameAr',
        'itemDesc',
        'itemDescAr',
        'cat_id',
        'sub_cat_id',
        'country_id',
        'type_id',
        'updated_at',
        'created_at',
        'item_colors_sizes'
    ];


    protected $appends = [
        'name',
        'desc',
        'country',
        'category',
        'sub_category',
        //'images',
        'image_url',
        'operations',
        'item_colors_sizes',
    ];



    public function getNameAttribute($value){
        return $this->itemName;
    }


    public function getDescAttribute($value){
        return $this->itemDesc;
    }


    public function getCountryAttribute($value){
        $country = Country::find($this->country_id);
        if(!empty($country)){
            return $country->name;
        }
    }

    public function getCategoryAttribute($value){
        $category = Category::find($this->cat_id);
        if(!empty($category)){
            return $category->name;
        }
    }


    public function getSubCategoryAttribute($value){
        $s_category = S_category::find($this->sub_cat_id);
        if(!empty($s_category)){
            return $s_category->name;
        }
    }



    public function getImagesAttribute($value){
        $images = Item_image::where('item_id',$this->id)->get()->makeHidden(['image_url','operations']);
        return $images;
    }




    public function getImageUrlAttribute($value){
        $image = Item_image::where('item_id',$this->id)->first();
        $image = !empty($image) ? $image->image_url : false;
        return $image;
    }



    public function getItemColorsAttribute($value){
        $colors = Color::get()->makeHidden(['code','operations'])->makeVisible('colorCode');
        return $colors;
    }



    public function getOperationsAttribute($value){
        return [
            "edit" => url('admin/Item/viewCreateItem/'.$this->id),
            "delete" => url('admin/Item/deleteItem/'.$this->id),
        ];
    }




    public function getItemColorsSizesAttribute(){
        return Item_color::where('item_id',$this->id)->get();
    }




}
