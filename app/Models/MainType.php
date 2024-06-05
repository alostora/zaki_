<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MainType extends Model
{
    use HasFactory;

    protected $table = 'main_types';

    protected $fillable = [

        "typeName",

        "typeNameAr",
    ];

    protected $hidden = [

        'typeName',

        'typeNameAr',

        'updated_at',

        'created_at'
    ];

    protected $appends = [
        'name',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->typeNameAr : $this->typeName;
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/MainType/edit/' . $this->id),

            "delete" => url('admin/MainType/delete/' . $this->id),
        ];
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'main_type_id', 'id');
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'main_type_id', 'id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class, 'main_type_id', 'id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'main_type_id', 'id');
    }
}
