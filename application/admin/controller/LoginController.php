<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;
use think\Config;
use think\Request;
use think\Session;
use app\admin\model\Admin;

class LoginController extends Controller
{

	//后台首页展示 以及管理员登陆
	public function index(Request $request){
		if($request->isPost()){
			$validate = validate('UserValidate');
			$check = $request->only(['captcha','__token__']);
			if(!$validate->check($check)){
				 return $this->error($validate->getError(),'/admin/login');
			}	
			$username = $request->param('username','trim');
			$password = $request->param('password','trim');

			$admin = new Admin;
			$res = $admin ->checkLogin($username,$password);
			if($res['status']=='fail'){
			
				return $this->error($res['info'],'/admin/login');
			}
			
			Session::set('username',$username);
			return $this->success($res['info'],'/admin/index');


		}elseif($request->isGet()){
		
			return $this->fetch();
		}	
	}

	//用户退出
	//
	public function logout(){
		Session::delete('username');
		return $this->redirect('/admin/login');
	
	}
	public function captcha(){
		$config = Config::get('captcha');
		$captcha = new Captcha($config);
		return $captcha->entry();
	}

}
