<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [

        "colorName",

        "colorNameAr",

        "colorCode",
    ];

    protected $hidden = [

        'colorName',

        'colorNameAr',

        'colorCode',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'code',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->colorNameAr : $this->colorName;
    }

    public function getCodeAttribute()
    {
        return '<label class="colorCode" style="background-color:' . $this->colorCode . '">' . $this->colorCode . '</label>';
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/Color/edit/' . $this->id),

            "delete" => url('admin/Color/delete/' . $this->id),
        ];
    }
}
