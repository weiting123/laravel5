<?php

use Illuminate\Support\Facades\Redis;

Route::get('db',function (){
    $rest=DB::select('select * from `tbl_user`');
    dd($rest);
});

Route::get('select','DbtestController@select');
Route::get('chunk','DbtestController@chunk');
//内联
Route::get('joins','DbtestController@joins');
//左连接
Route::get('leftjoin','DbtestController@leftjoin');
//右连接
Route::get('rightjoin','DbtestController@rightjoin');
//Cross Join
Route::get('crossjoin','DbtestController@crossjoin');


//模型操作
Route::get('user','DbtestController@user');
Route::get('score','DbtestController@score');
Route::get('teacher','DbtestController@teacher');
Route::get('score','DbtestController@score');
Route::get('student','DbtestController@student');
Route::get('redis','DbtestController@redis');
Route::get('publish',function (){
    Redis::subscribe(['laravelwt'],json_encode(['laravelwt'=>'11111111']));
});