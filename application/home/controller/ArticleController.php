<?php
namespace app\home\controller;

use think\Controller;

class ArticleController extends Controller
{

	public function listArticle(){
	
		return $this->fetch('list');
	}

	public function detailArticle(){
		return $this->fetch('detail');
	}

}
