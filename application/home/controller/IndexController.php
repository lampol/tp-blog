<?php
namespace app\home\controller;

use app\home\controller\BaseController;
use app\home\model\Article;

class IndexController extends BaseController
{

	public function index(){
		$article = new Article;
		$articles = $article->getAllArticle();
		$this->assign('articles',$articles);
		return $this->fetch();
	}
}
