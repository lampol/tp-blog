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
	//获取一条分类信息
	public function getOneCat($id){
		return $this->find($id)->toArray();
	}

	//更新分类
	public function updateCat($id,$data){
		if($this->where('id',$id)->update($data)){
			$res = ['status'=>'success','info'=>'分类更新成功'];  
		}else{
			$res = ['status'=>'fail','info'=>'分类更新失败'];
		}		
		return $res;
	}
	//删除分类
	//
	public function deleteCat($id){
		if($this->where('id',$id)->delete()){
		
			$res = ['status'=>'success','info'=>'分类删除成功'];
		}else{
			 $res = ['status'=>'fail','info'=>'分类删除失败']; 
		}
		return $res;
	}

	//获取分类总条数
	//
	public function getAllCatCount(){
		return $this->count();
	}
}
