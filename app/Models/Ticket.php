<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Получить сообщения для тикета.
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
    
    /**
    * Получить пользователя данного тикета.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
    * Получить статус данного тикета.
    */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
