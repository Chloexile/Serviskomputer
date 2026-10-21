<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'username',
        'password',
        'email',
        'nama_petugas',
        'level',
        'jenis_kelamin'
    ];
}