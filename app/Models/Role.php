<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  /**
   * Получить пользователей для роли.
   */
  public function users()
  {
    return $this->hasMany('App\Models\User');
  }
    
}
