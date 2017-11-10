<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{

	protected $table='blog_cat';	
	//添加分类

	public function addCat($cat_name,$cat_desc){
		$data = ['cat_name'=>$cat_name,'cat_desc'=>$cat_desc];
		if($this->save($data)){
			$res = ['status'=>'success','info'=>'分类添加成功'];
		}else{
			$res = ['status'=>'fail','info'=>'分类添加失败'];
		}
		return $res;
	}

	//获取所有分类
	public function getAllCat(){
		return $this->select()->toArray();
	}
}
