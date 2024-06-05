<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [

        "categoryName",

        "categoryNameAr",

        "categoryImage",

        "main_type_id",
    ];

    protected $hidden = [

        'categoryName',

        'categoryNameAr',

        'categoryImage',

        'image_path',

        'main_type_id',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'image_url',

        'image_path',

        'type',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->categoryNameAr : $this->categoryName;
    }

    public function getImageUrlAttribute()
    {
        $categoryImage = url('Admin_uploads/categories/' . $this->categoryImage);

        return '<img src="' . $categoryImage . '" class="table-image">';
    }

    public function getImagePathAttribute()
    {
        return url('Admin_uploads/categories/' . $this->categoryImage);
    }

    public function getTypeAttribute()
    {
        $mainType = MainType::find($this->main_type_id);

        if (!empty($mainType)) {

            return $mainType->name;
        }

        return false;
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/Category/edit/' . $this->id),

            "delete" => url('admin/Category/delete/' . $this->id)
        ];
    }

    public function subCategories(): HasMany
    {
        return $this->hasMAny(SubCategory::class, 'category_id', 'id');
    }

    public function mainType(): BelongsTo
    {
        return $this->belongsTo(MainType::class, 'main_type_id', 'id');
    }
}
