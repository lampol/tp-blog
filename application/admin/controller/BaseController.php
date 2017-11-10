<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class BaseController extends Controller
{

	public function _initialize(){
	
		if(!Session::get('username')){
		
			return $this->redirect('/admin/login');
		}
	}
}
