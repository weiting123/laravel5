<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Score;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $table='tbl_user';
    use SoftDeletes;
//    const DELETED_AT='deleted_at';
//    protected $dates=['deleted_at'];

    public function score()
    {
//        return $this->hasOne('Score');
        return $this->hasMany(Score::class ,'name_id','id');
    }
}
