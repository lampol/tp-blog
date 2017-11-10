<?php
namespace app\common\validate;


use think\Validate;

class UserValidate extends Validate{

	protected $rule=['captcha|验证码'=>'require|length:4|captcha|token'];

}
