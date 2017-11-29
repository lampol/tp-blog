<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use app\home\controller\BaseController;

class SearchController extends BaseController
{

	public function search(Request $request){
		dump($request->param('words'));
	
	}
}
