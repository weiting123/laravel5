<?php

namespace App\Http\Controllers;

use App\Admin\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin\Score;
use Illuminate\Support\Facades\Redis;

class DbtestController extends Controller
{
    public function select()
    {
        $user = DB::table('tbl_user')->get();
        dump($user->toArray());
    }

    public function chunk()
    {
        DB::table('tbl_score')->orderBy('id')->chunk(2, function ($citys) {
            foreach ($citys as $city) {
                echo $city->subject . '<br>';
            }
        });
    }

    public function joins()
    {
        $users=DB::table('tbl_user')
            ->join('tbl_score','tbl_user.id','=','tbl_score.name_id')
            ->join('tbl_teacher','tbl_score.id','=','tbl_teacher.subject_id')
            ->get();
        dd($users);
    }

    public function leftjoin()
    {
        $leftjoin=DB::table('tbl_user')
            ->leftJoin('tbl_score','tbl_user.id','=','tbl_score.name_id')
            ->get();
        dd($leftjoin);
    }

    public function rightjoin()
    {
        $rightjoin=DB::table('tbl_user')
            ->rightJoin('tbl_score','tbl_user.id','=','tbl_score.name_id')
            ->get();
        dd($rightjoin);
    }

    public function crossjoin()
    {
        $crossjoin=DB::table('tbl_user')->crossJoin('tbl_score')->get();
        dump($crossjoin->toArray());
    }

    public function user()
    {
//        $userModel=new User();
//        $user=User::all()->toArray();
//        $user=User::find(1)->toArray();
//        $user=User::get()->toArray();
//        $userModel->name='学生丙';
//        $bool=$userModel->save();
//        dump($bool);
//        $userModel=User::find(3);
//        dump($userModel->toArray());
//        $bool=User::where('id','=','3')->delete();
//        $user=User::all()->toArray();
//        $user=User::withTrashed()->where('id','=','3')->get()->toArray();
//        $user=User::withTrashed()->get()->toArray();
//        $user=User::onlyTrashed()->get()->toArray();
//        $bool=User::onlyTrashed()->restore();
//        dump($bool);
       $user=User::with('score:name_id,subject')->get();
       dump($user->toArray());
    }

    public function score()
    {
//        $users=Score::find(8)->user;
        $user=Score::with('user:id,name')->get()->toArray();
        dump($user);
    }

    public function student()
    {
        $stud=Student::find(1)->grade;
        dump($stud->toArray());
    }

    public function redis()
    {
//        $redis=new Redis();
        $user=Redis::set('name','wt');
        $users=Redis::get('name');
        dump($users);

    }
}
