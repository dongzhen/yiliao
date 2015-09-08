<?php
class UserModel extends Model{
	public $table='yonghu';

	//自动验证
	public $validate=array(
		array('kahao','nonull','卡号不能为空',2,3),
		array('kahao','isKahao','卡号已存在',2,3),
		array('password','nonull','密码不能为空',2,3),
		// array('number','nonull','手机号不能为空',2,3),
		// array('codes','nonull','验证码不能为空',2,3),
	);
	public function isKahao($name,$value,$msg,$org){
		if(M('yonghu')->where("$name ='$value'")->all()){
			return $msg;
		}else{
			return true;
		}
	}


	// 用户注册
	public function regAdd(){
		$code=md5(mt_rand(0,1000).time());
		$password=md5($_POST['password'].$code);
		$data['kahao']=$_POST['kahao'];
		$data['truename']=$_POST['kahao'];
		$data['code']=$code;
		$data['shenfenzheng']=$_POST['shenfenzheng'];
		$data['shengao']=$_POST['shengao'];
		 if ($_POST['xingbie']==1) {
            $data['xingbie']='男';
        }else{
            $data['xingbie']='女';
        }
		$data['number']=$_POST['number'];
		if ($_POST['xuexing']==1) {
            $data['xuexing']='A';
        }
        if ($_POST['xuexing']==2) {
            $data['xuexing']='B';
        }
        if ($_POST['xuexing']==3) {
            $data['xuexing']='AB';
        }
        if ($_POST['xuexing']==4) {
            $data['xuexing']='O';
        }
		// $data['xuexing']=$_POST['xuexing'];
		$data['minzu']=$_POST['minzu'];
		$data['xingming']=$_POST['xingming'];
		$data['zhuzhi']=$_POST['zhuzhi'];
		$data['shengri']=$_POST['shengri'];
		$data['minzu']=$_POST['minzu'];
		$data['password']=$password;
		$data['logintime']=time();
		if($this->create()){
			// if(strtoupper($_POST['codes']) != $_SESSION['code']){
			// 	$this->error='验证码输入错误';
			// 	return false;
			// }
			if($this->add($data)){
				return true;
			}else{
				$this->error='注册失败';
			}
		}
	}

	//用户登陆
	//后台登录
	public function loginUser(){
		$username=Q('post.kahao');
		$password=Q('post.password');
		if(empty($username)){
			$this->error='卡号不能为空';
			return false;
		}
		if(empty($password)){
			$this->error='密码不能为空';
			return false;
		}
		$user=$this->where("kahao='$username'")->find();
		if(!$user){
			$this->error='卡号不存在';
			return false;
		}
		// if($user['status']==0){
		// 	$this->error='此用户已锁定';
		// 	return false;
		// }
		if($user['password'] !== md5($password.$user['code'])){
			$this->error='密码错误';
			return false;
		}
		$user['logintime']=time();
		M('user')->save($user);
		unset($user['password']);
		unset($user['code']);
		$_SESSION['user']=$user;

		// $this->success('登陆成功正在返回首页','index/yonghu');
		return $_SESSION['user'];
	}
}