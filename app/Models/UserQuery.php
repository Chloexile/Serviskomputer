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

public function tampil($table) {
    return DB::table($table)->get();
}

public function tampilfilter($table, $tgl_awal, $tgl_akhir) {
    return DB::table($table)
        ->whereBetween('created_at', [
            $tgl_awal . ' 00:00:00',
            $tgl_akhir . ' 23:59:59'
        ])
        ->get();
}
}