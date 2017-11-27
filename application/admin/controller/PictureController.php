<?php

namespace app\admin\controller;

use app\admin\controller\BaseController;
use think\Request;
use app\admin\model\Pic;

class PictureController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
	$picture = new Pic;
	$pics = $picture->getAllPic();
	$this->assign('pics',$pics);
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
        $data = $request->except('file');
	$picture = new Pic;
	$res = $picture->addPic($data);
	if($res['status']=='fail'){
		return $this->error($res['info'],'/admin/pic');
	}
		return $this->success($res['info'],'/admin/pic');
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
	$picture = new Pic;
	$pic     = $picture->getOnePic($id);
	$this->assign('pic',$pic);
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
        $data = $request->except(['_method','file']);
	$picture = new Pic;
	$res = $picture->updatePic($id,$data);
	if($res['status']=='fail'){                              
       		 return $this->error($res['info'],'/admin/pic');  
	}                                                        
        return $this->success($res['info'],'/admin/pic');
	
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
