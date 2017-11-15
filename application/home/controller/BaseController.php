<?php

namespace app\home\controller;

use think\Controller;
use app\home\model\Article;
use think\View;

class BaseController extends Controller
{
	public function _initialize(){
	
		$article = new Article;
		$cats = $article->getAllCat();	
		View::share('cats',$cats);
	}
}
