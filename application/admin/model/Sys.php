<?php

namespace app\admin\model;

use think\Model;

class Sys extends Model
{
    //
	public function getSys(){
		return $this->find();

	}

	public function updateSys($id,$data){
		if($this->where('id',$id)->update($data)){

			$data = ['status'=>'success','info'=>'修改配置成功'];
		}else{
			$data = ['status'=>'fail','info'=>'修改配置失败'];
		}
		return $data;
	}
}
