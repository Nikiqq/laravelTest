<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
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
        return $this->belongsTo('App\Models\User');
    }
    
    /**
    * Получить тикет данного сообщению.
    */    
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
