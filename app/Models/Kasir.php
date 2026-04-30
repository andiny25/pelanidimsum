<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable agar bisa Login
use Illuminate\Notifications\Notifiable;

class Kasir extends Authenticatable
{
    use Notifiable;

    protected $table = 'kasir'; // Beritahu Laravel nama tabelnya adalah 'kasir'

    protected $fillable = [
        'nama_kasir',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}