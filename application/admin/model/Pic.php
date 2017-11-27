<?php

namespace app\admin\model;

use think\Model;

class Pic extends Model
{
    //
	//添加幻灯片
	public function addPic($data){
		if($this->save($data)){
			$res = ['status'=>'success','info'=>'添加幻灯片成功'];
		}else{
			$res = ['status'=>'fail','info'=>'添加幻灯片失败'];

		}
		return $res;
	}
	//获取所有的幻灯片
	public function getAllPic(){
		return  $this->field(['summary'],true)->select()->toArray();
	}
	//获取一条幻灯片信息

	public function getOnePic($id){
		return $this->where('id',$id)->find()->toArray();

	}

	//修改幻灯片

	public function updatePic($id,$data){
		if($this->where('id',$id)->update($data)){
			$res = ['status'=>'success','info'=>'修改幻灯片成功'];
		}else{
			$res = ['status'=>'fail','info'=>'修改幻灯片失败'];
		}		
		return $res;
	}
	//删除幻灯片
	public function deletePic($id){
		if($this->where('id',$id)->delete()){
			$res = ['status'=>'success','info'=>'删除幻灯片成功'];
		}else{
			$res = ['status'=>'fail','info'=>'删除幻灯片失败'];
		}
		return $res;
	}	

}
