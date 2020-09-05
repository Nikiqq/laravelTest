<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    /**
     * Получить сообщения для тикета.
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}
