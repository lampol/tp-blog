<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//
use think\Route;

Route::get('admin/login','admin/LoginController/index');
Route::get('admin/index','admin/IndexController/index');
Route::get('admin/welcome','admin/IndexController/welcome');
Route::resource('admin/article','admin/ArticleController');
Route::resource('admin/cat','admin/CategoryController');
Route::resource('admin/pic','admin/PictureController');
Route::resource('admin/sys','admin/SystemController');
