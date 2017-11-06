<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;
use think\Config;

class LoginController extends Controller
{
	public function index(){
	
		return $this->fetch();
	}


	public function captcha(){
		$config = Config::get('captcha');
		$captcha = new Captcha($config);
		return $captcha->entry();
	}

}
