<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_id';

    protected $table = 'roles';

    protected $fillable = ['name', 'display_name'];

    public function assignPermissions($permissionIds)
    {
        return $this->permissions()->attach($permissionIds);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id', 'permission_id');
    }

    public function hasPermission($permissionName)
    {
        return $this->permissions->contains('name', $permissionName);
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'LIKE', "%{$name}%") : null;
    }

    public function scopeWithOutSuperAdmin($query)
    {
        return $query->where('name', '!=', 'super-admin');
    }
}
