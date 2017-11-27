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
	//获取文章分类名称
	public function getCatName($cat_id){
	
		return Db::name('cat')->where('id',$cat_id)->value('cat_name');
	}
	//增加文章浏览量
	public function addViews($id){
		$this->where('id',$id)->setInc('views');
	}
	//获取最近文章
	//
	public function getNewArt(){
		return $this->field(['id','title'])->order('created_at DESC')->limit(10)->select()->toArray();
	
	}
	//获取热门标签
	public function getHotTag(){
		return $this->order('views DESC')->distinct(true)->limit(30)->column('tag');
	}

	//随机获取4条同一分类的文章
	public function getRandArticle($id){
		$cid = $this->where('id',$id)->value('cat_id');
		$res = $this->where('cat_id',$cid)->field(['id','img_url','title'])->order('rand()')->limit(4)->select()->toArray();
		return  $res;	
	}

	//获取上一篇文章
	public function getPreArticle($id){
		$res = $this->where('id','<',$id)->field(['id','title'])->order('id DESC')->limit(1)->find();

		if($res){
			return $res->toArray();			
		}else{
			return $res="已经是最新的文章了";
		}
	}
	//获取下一篇文章
	public function getNextArticle($id){
		$res = $this->where('id','>',$id)->field(['id','title'])->order('id ASC')->limit(1)->find();
		if($res){
			return $res->toArray(); 
		}else{
			return $res="已经是最后的文章了";
		}
	}
	//获取幻灯片的信息
	public function getAllPic(){
		return Db::name('pic')->where('is_show',1)->field(['id','is_show'],true)->select()->toArray();
	}



}
