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

Route::any('admin/login','admin/LoginController/index',['method'=>'get|post']);
Route::get('admin/logout','admin/LoginController/logout');
Route::get('admin/index','admin/IndexController/index');
Route::get('captcha','admin/LoginController/captcha');
Route::get('admin/welcome','admin/IndexController/welcome');
Route::resource('admin/article','admin/ArticleController');
Route::resource('admin/cat','admin/CategoryController');
Route::resource('admin/pic','admin/PictureController');
Route::resource('admin/sys','admin/SystemController');
Route::post('admin/upArtImg','admin/UploadController/uploadArt');
