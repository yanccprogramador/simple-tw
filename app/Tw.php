<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tw extends Model
{
    //
    public $timestamps = false;
    public $fillable = ['id_user','text'];
    protected  $table='tw';
    static function  getTwWithUser()
    {
        return DB::select(DB::raw('select text,u.icon,u.name from tw,users u WHERE tw.id_user=u.id'));
    }
}
