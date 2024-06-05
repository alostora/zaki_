<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [

        'name',
        
        'email',
        
        'permission_id',
        
        'password',
    ];

    protected $hidden = [
        
        'password',
        
        'remember_token',
        
        'email_verified_at',
        
        'permission_id',
        
        'created_at',
        
        'updated_at',
    ];

    protected $casts = [

        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        
        'permission',
        
        'operations',
    ];

    public function getPermissionAttribute($value)
    {
        $permission = Permission::find($this->permission_id);

        if ($permission) {

            return $permission->name;

        }

        return 'no permission for this user';
    }

    public function getOperationsAttribute($value)
    {
        return [

            "edit" => url('admin/Admin/edit/' . $this->id),
            
            "delete" => url('admin/Admin/delete/' . $this->id),
        ];
    }
}
