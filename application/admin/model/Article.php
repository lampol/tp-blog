<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    	protected $autoWriteTimestamp = true;
	// 定义时间戳字段名
	protected $createTime = 'created_at';
	protected $updateTime = 'updated_at';
	
	public function addArt($data){
	
		if($this->save($data)){
			$res = ['status'=>'success','info'=>'文章发部成功'];
		}else{
			$res = ['status'=>'fail','info'=>'文章发部失败'];
		}
		return $res;
	}
}
