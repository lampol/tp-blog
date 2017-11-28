<?php

namespace app\home\controller;

use think\Controller;
use app\home\model\Article;
use think\View;

class BaseController extends Controller
{
	public function _initialize(){
	
		$article  = new Article;
		$cats     = $article->getAllCat();	
		$new_art  = $article->getNewArt();
		$hot_tags = $article->getHotTag();
		$links    = $article->getAllLink();
		View::share('links',$links);
		View::share('cats',$cats);
		View::share('hot_tags',$hot_tags);
		View::share('new_art',$new_art);
	}
}
