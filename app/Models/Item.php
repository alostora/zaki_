<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

        "main_type_id",

        'category_id',

        'sub_category_id',

        'country_id',

    ];

    protected $hidden = [

        'itemName',

        'itemNameAr',

        'itemDesc',

        'itemDescAr',

        'category_id',

        'sub_category_id',

        'country_id',

        'main_type_id',

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

        'operations',
    ];

    public function getNameAttribute()
    {
        return $this->itemName;
    }

    public function getDescAttribute()
    {
        return $this->itemDesc;
    }

    public function getCountryAttribute()
    {
        $country = Country::find($this->country_id);
        if (!empty($country)) {
            return $country->name;
        }
    }

    public function getCategoryAttribute()
    {
        $category = Category::find($this->category_id);
        if (!empty($category)) {
            return $category->name;
        }
    }

    public function getSubCategoryAttribute()
    {
        $subCategory = SubCategory::find($this->sub_category_id);
        if (!empty($subCategory)) {
            return $subCategory->name;
        }
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/Item/edit/' . $this->id),

            "delete" => url('admin/Item/delete/' . $this->id),

            "images" => url('admin/Item/ItemImage/' . $this->id),

            "properties" => url('admin/Item/ItemProperty/' . $this->id),
        ];
    }

    public function itemImages():HasMany
    {
        return $this->hasMany(ItemImage::class,'item_id','id');
    }
    
    public function itemProperties():HasMany
    {
        return $this->hasMany(ItemProperty::class,'item_id','id');
    }
}
