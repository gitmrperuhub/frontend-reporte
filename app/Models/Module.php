<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Module extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    //use HasFactory;
    protected $fillable = [
        'id'
    ];
    protected $hidden = [
        'icon_1',
        'icon_2',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
