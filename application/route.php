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
Route::resource('admin/link','admin/LinkController');
Route::post('admin/upArtImg','admin/UploadController/uploadArt');
Route::post('admin/upPicImg','admin/UploadController/uploadPic');


//前台路由
Route::get('/','home/IndexController/index');
Route::get('list/cid/:cid','home/ArticleController/listArticle');
Route::get('detail/aid/:aid','home/ArticleController/detailArticle');
Route::post('search','home/SearchController/search');
Route::post('comment','home/ArticleController/comment');
