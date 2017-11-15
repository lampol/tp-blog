<?php
namespace app\home\controller;

use app\home\controller\BaseController;
use app\home\model\Article;

class ArticleController extends BaseController
{

	public function listArticle($cid){
		$cat_id = decrypt($cid);

		$article = new Article;

		$articles = $article->getCatArticle($cat_id);

		$this->assign('articles',$articles);
	
		return $this->fetch('list');
	}

	public function detailArticle($aid){
		$id = decrypt($aid);
		$art = new Article;
		$article = $art->getOneArticle($id);
		$this->assign('article',$article);
		return $this->fetch('detail');
	}

}
