<?php
namespace app\home\model;

use think\Model;
use think\Db;

class Article extends Model
{
	//获取首页的文章
	public function getAllArticle(){
		$data = $this->field(['id','title','author','img_url','summary','tag','created_at','views'])->paginate(3);
		return $data;
	
	}
	//获取一条文章
	public function getOneArticle($id){
		$art = $this->find($id);
		return $art;
	}
	//获取所有分类
	public function getAllCat(){
		return Db::name('cat')->field(['id','cat_name'])->select()->toArray();
	}
	//获取分类文章
	public function getCatArticle($cat_id){
	
		return $this->where('cat_id',$cat_id)->field(['id','title','author','img_url','summary','tag','created_at','views'])->paginate(2);
	}
}
