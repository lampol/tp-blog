<?php

namespace app\admin\controller;

use app\admin\controller\BaseController;
use think\Controller;
use think\Request;
use app\admin\model\Link;

class LinkController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
	$link = new Link;
	$links = $link->getAllLink();
	$this->assign('links',$links);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
	$data = $request->param();
        $link = new Link;
	$res = $link->addLink($data);
	if($res['status']=='fail'){
		return $this->error($res['info'],'/admin/link');
	}
	return $this->success($res['info'],'/admin/link');
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $link = new Link;
	$res  = $link->getOneLink($id);
	$this->assign('link',$res);
	return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
	$data = $request->except('_method');
        $link = new Link;
	$res = $link->updateLink($id,$data);
	if($res['status']=='fail'){
		return $this->error($res['info'],'/admin/link');
	}
	return $this->success($res['info'],'/admin/link');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $link = new Link;
	$res = $link->deleteLink($id);
	return json($res);
    }
}
