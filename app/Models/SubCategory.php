<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = "sub_categories";

    protected $fillable = [

        "subCategoryName",

        "subCategoryNameAr",

        "subCategoryImage",
        
        "category_id",
    ];

    protected $hidden = [

        'subCategoryName',

        'subCategoryNameAr',

        'subCategoryImage',

        'image_path',

        'category_id',

        'updated_at',

        'created_at'

    ];

    protected $appends = [

        'name',

        'image_url',

        'image_path',

        'main_category',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->subCategoryNameAr : $this->subCategoryName;
    }

    public function getImageUrlAttribute()
    {
        $subCategoryImage = url('Admin_uploads/subCategories/' . $this->subCategoryImage);
        return '<img src="' . $subCategoryImage . '" class="table-image">';
    }

    public function getImagePathAttribute()
    {
        return url('Admin_uploads/subCategories/' . $this->subCategoryImage);
    }

    public function getMainCategoryAttribute()
    {
        $mainCategory = Category::find($this->category_id);
        if (!empty($mainCategory)) {
            return $mainCategory->name;
        }
        return false;
    }

    public function getOperationsAttribute()
    {

        return [
            "edit" => url('admin/SubCategory/edit/' . $this->id),
            "delete" => url('admin/SubCategory/delete/' . $this->id),
        ];
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
