<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function grade()
    {
        return $this->belongsToMany(Grade::class,'grade_students','student_id','grade_id','id','teacher_id');
    }
}
