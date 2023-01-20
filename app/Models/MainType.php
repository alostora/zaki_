<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
