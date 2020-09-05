<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
  /**
   * Сообщения, принадлежащие файлу.
   */
    
  public function messages()
  {
    return $this->belongsToMany('App\Models\Message');
  }
}
