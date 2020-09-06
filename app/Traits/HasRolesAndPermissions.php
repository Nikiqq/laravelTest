<?php

namespace App\Traits;

trait HasRolesAndPermissions
{

    public function roles()
    {
        return $this->belongsToMany('ApModels\Role', 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Perission', 'users_permissions');
    }
    
    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    
    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function hasPermissionTo($permission)
    {
       return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    
    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
}