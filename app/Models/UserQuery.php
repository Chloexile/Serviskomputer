<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserQuery extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'username',
        'password',
    ];

    public function findUser($tableName, $condition)
    {
        return DB::table($tableName)
            ->where($condition)
            ->first();
    }

    public function getAll($tableName)
    {
        return DB::table($tableName)->get();
    }

    public function tambah($tableName, $data)
    {
        return DB::table($tableName)->insert($data);
    }

    public function pull($tableName, $condition)
    {
        return DB::table($tableName)
            ->where($condition)
            ->first();
    }
}