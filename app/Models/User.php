<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        
    /**
     * Получить сообщения для пользователя.
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
    
    /**
     * Получить тикеты для пользователя.
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
