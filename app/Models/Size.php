<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';

    protected $fillable = [

        "sizeName",

        "sizeNameAr",

        "sizeValue",

        "main_type_id", //same category type in categories table
    ];

    protected $hidden = [

        'sizeName',

        'sizeNameAr',

        'updated_at',

        'created_at'
    ];

    protected $appends = [

        'name',

        'main_type',

        'operations'
    ];

    public function getNameAttribute($value)
    {
        return app()->getLocale() == 'ar' ? $this->sizeNameAr : $this->sizeName;
    }

    public function getMainTypeAttribute($value)
    {
        $mainType = MainType::find($this->main_type_id);
        if (!empty($mainType)) {
            return $mainType->name;
        }
    }

    public function getOperationsAttribute($value)
    {
        return [
            "edit" => url('admin/Size/edit/' . $this->id),

            "delete" => url('admin/Size/delete/' . $this->id),
        ];
    }
    
    public function mainType(): BelongsTo
    {
        return $this->belongsTo(MainType::class, 'main_type_id', 'id');
    }
}
