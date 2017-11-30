<?php
namespace app\home\controller;

use app\home\controller\BaseController;
use app\home\model\Article;
use think\Request;

class ArticleController extends BaseController
{

	public function listArticle($cid){
		$cat_id = decrypt($cid);

		$article = new Article;

		$articles = $article->getCatArticle($cat_id);
		$cat_name = $article->getCatName($cat_id);

		$this->assign('articles',$articles);
		$this->assign('cat_id',$cat_id);
		$this->assign('cat_name',$cat_name);
	
		return $this->fetch('list');
	}

	public function detailArticle($aid){
		$domain = Request::instance()->domain();
		$id = decrypt($aid);
		$art = new Article;
		$article = $art->getOneArticle($id);
		$randArticle = $art->getRandArticle($id);
		$preArticle  = $art->getPreArticle($id);
		$nextArticle  = $art->getNextArticle($id);
		$art->addViews($id);
		$this->assign('article',$article);
		$this->assign('preArticle',$preArticle);
		$this->assign('domain',$domain);
		$this->assign('nextArticle',$nextArticle);
		$this->assign('randArticle',$randArticle);
		return $this->fetch('detail');
	}

	public function comment(Request $request){
		$validate = validate('UserValidate');
		$check= $request->only(['__token__','captcha']);
		if(!$validate->check($check)){
			return $this->error($validate->getError());
		}
	}

}
