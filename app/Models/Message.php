<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /**
    * Файлы, принадлежащие сообщению.
    */

    public function files()
    {
        return $this->belongsToMany('App\Models\File');
    }
    
    /**
    * Получить пользователя данного сообщению.
    */
    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
    
    /**
    * Получить тикет данного сообщению.
    */    
    public function ticket()
    {
        return $this->belongsToMany('App\Models\Ticket');
    }
}
