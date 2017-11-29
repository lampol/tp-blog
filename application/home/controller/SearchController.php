<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use app\home\controller\BaseController;
use lampol\SphinxClient;
use think\Config;


class SearchController extends BaseController
{

	public function search(Request $request){
		$sc = new SphinxClient ();
		$words = $request->param('words','trim');
		$port = Config::get('sphinx.SPHINX_PORT');
		$host = Config::get('sphinx.SPHINX_HOST');
		$index = "article";
		$sc->SetServer ( $host, $port );
		//设置连接的超时时间
		$sc->SetConnectTimeout ( 1 );
		//返回数组的数据格式
		$sc->SetArrayResult ( true );
		//开始查询
		$res = $sc->Query ( $words, $index );
		$this->assign('words',$words);
		if(isset($res['matches'])){

			$this->assign('res',$res['matches']);
		}else{
			$this->assign('res','没有匹配的数据');
		}

		return $this->fetch('list');	
	}
}
