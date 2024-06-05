<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MigrationRole extends Model
{
    use HasFactory;

    protected $table = 'migration_roles';

    protected $fillable = [

        'permission_id',

        'migration_id',

        'role_id',
    ];

    public function permission():BelongsTo
    {
        return $this->belongsTo(Permission::class,'permission_id','id');
    }
    
    public function migrationTable():BelongsTo
    {
        return $this->belongsTo(Migration::class,'migration_id','id');
    }
    
    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
