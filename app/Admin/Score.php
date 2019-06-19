<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    protected $table='tbl_score';
    use SoftDeletes;

    public function user()
    {
//        return $this->belongsTo(User::class,'id','name_id');
        return $this->hasMany(User::class,'id','name_id');
    }
}
