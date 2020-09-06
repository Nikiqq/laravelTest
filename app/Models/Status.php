<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
   /**
    * Получить тикеты для статуса.
    */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
