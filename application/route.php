<?php
use think\Route;

//api.tp5.com ==> www.tp5.com/index.php/api
Route::domain('api','api');
//api.tp5.com/user ==> www.tp5.com/index.php/api/user/login
Route::post('user','user/login');
//notice
Route::post('notice','notice/index');

Route::post('add','notice/add_notice');

Route::post('delete','notice/delete');

Route::post('show','notice/show');

Route::post('update','notice/update');