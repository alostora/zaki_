<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemProperty extends Model
{
    use HasFactory;

    protected $table = 'item_properties';

    protected $fillable = [

        'item_id',

        'color_id',

        'size_id',

        'quantity',
    ];

    protected $hidden = [

        "created_at",

        "updated_at",
    ];
    protected $appends = [

        'operations',
    ];

    public function getOperationsAttribute()
    {
        return [

            "delete" => url('admin/Item/ItemProperty/delete/' . $this->id),
        ];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
