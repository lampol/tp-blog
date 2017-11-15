<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Article;

class ArticleController extends Controller
{

	public function listArticle(){
	
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
