<?php

namespace App\Traits;

trait HasRoles
{    
    public function hasRole($roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}