<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
	public function checkLogin($username,$password){
		$admin = $this->where('username',$username)->find();
		if($admin){
			$user = $admin->toArray();
			$pass = md5($password.$user['salt']);
			if($pass==$user['password']){
			
				$res = ['status'=>'success','info'=>'登陆成功'];
			}else{
			
				$res = ['status'=>'fail','info'=>'密码错误'];
			}

		
		}else{
			$res = ['status'=>'fail','info'=>'用户名不存在'];
		
		}

		return $res;
		
	
	}
}
