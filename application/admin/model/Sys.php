<?php

namespace app\admin\model;

use think\Model;

class Sys extends Model
{
    //
	public function getSys(){
		return $this->find();

	}
}
