<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    	protected $autoWriteTimestamp = true;
	// 定义时间戳字段名
	protected $createTime = 'created_at';
	protected $updateTime = 'updated_at';

	//添加文章	
	public function addArt($data){
	
		if($this->save($data)){
			$res = ['status'=>'success','info'=>'文章发部成功'];
		}else{
			$res = ['status'=>'fail','info'=>'文章发部失败'];
		}
		return $res;
	}
	//获取所有文章
	public function getAllArticle($list){
	
		$data = $this->alias('a')->field('a.id,a.title,a.views,a.created_at,c.cat_name')->join('cat c','a.cat_id=c.id')->paginate($list);
		return $data;

	}
}
