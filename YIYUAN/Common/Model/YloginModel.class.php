<?php
class YloginModel extends Model{
	public $table='yisheng';

	//后台登录
	public function login(){
		$username=Q('post.username');
		$password=Q('post.password');
		$code=Q('post.code','','strtoupper');
		if(empty($username)){
			$this->error='账号不能为空';
			return false;
		}
		if(empty($password)){
			$this->error='密码不能为空';
			return false;
		}
		if(empty($code)){
			$this->error='验证码不能为空';
			return false;
		}
		$user=$this->where("username='$username'")->find();
		if(!$user){
			$this->error='用户不存在';
			return false;
		}
		if($code !== session('code')){
			$this->error='验证码错误';
			return false;
		}
		if ($user['password']!==$password) {
			$this->error='登录密码错误';
			return false;
		}
		$user['logintime']=time();
		M('yisheng')->save($user);
		unset($user['password']);
		unset($user['code']);
		$_SESSION['user']=$user;
		// go('Index/yindex');
		return true;
	}
	
}