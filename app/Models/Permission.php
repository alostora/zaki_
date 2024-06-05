<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [

        'permissionName',

        'permissionNameAr'
    ];

    protected $hidden = [

        'permissionName',

        'permissionNameAr',

        'created_at',

        'updated_at',
    ];

    protected $appends = [

        'name',

        'operations',
    ];

    public function getNameAttribute()
    {

        return app()->getLocale() == 'ar' ? $this->permissionName : $this->permissionNameAr;
    }

    public function getOperationsAttribute()
    {
        return [

            "edit" => url('admin/Permission/edit/' . $this->id),

            "delete" => url('admin/Permission/delete/' . $this->id),
        ];
    }

    public function migrationRoles(): HasMany
    {
        return $this->hasMany(MigrationRole::class, 'permission_id');
    }
}
