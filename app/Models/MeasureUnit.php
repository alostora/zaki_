<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasureUnit extends Model
{
    use HasFactory;

    protected $table = 'measure_units';

    protected $fillable = [

        "unitName",

        "unitNameAr",

        "unitCode",

        "unitType", //tall,weight,lequed,....
    ];

    protected $hidden = [

        'unitName',

        'unitNameAr',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'operations'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->unitNameAr : $this->unitName;
    }

    public function getOperationsAttribute()
    {
        return [
            "edit" => url('admin/MeasureUnit/edit/' . $this->id),

            "delete" => url('admin/MeasureUnit/delete/' . $this->id),
        ];
    }
}
