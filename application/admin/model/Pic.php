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
}
