<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";

    protected $fillable = [

        "brandName",

        "brandNameAr",

        "brandImage",
    ];

    protected $hidden = [

        'brandName',

        'brandNameAr',

        'brandImage',

        'image_path',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'image_url',

        'image_path',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->brandNameAr : $this->brandName;
    }

    public function getImageUrlAttribute()
    {
        $brandImage = url('Admin_uploads/brands/' . $this->brandImage);

        return '<img src="' . $brandImage . '" class="table-image">';
    }

    public function getImagePathAttribute()
    {
        return url('Admin_uploads/brands/' . $this->brandImage);
    }

    public function getOperationsAttribute()
    {
        return [
            "edit" => url('admin/Brand/edit/' . $this->id),

            "delete" => url('admin/Brand/delete/' . $this->id),
        ];
    }
}
