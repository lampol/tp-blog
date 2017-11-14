<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Article;

class IndexController extends Controller
{

	public function index(){

		$article = new Article;
		$articles = $article->getAllArticle();
		$this->assign('articles',$articles);
		return $this->fetch();
	}
}
