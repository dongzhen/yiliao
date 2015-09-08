<?php
class LoginController extends Controller{
	private $db;
	private $yyy;

	public function __init(){
		$this->db=K('User');
		$this->yyy=K('Yylogin');
	}

	// 用户登陆
	public function login(){
		if(IS_POST){
			if($this->db->loginUser()){
				// p($_SESSION['user']);exit;
 
				$this->assign('user',$_SESSION['user']);
				$this->success('登陆成功','Index/yonghu');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}
			//保健医院登录
	public function yylogin(){
		if (IS_POST) {
			if($this->yyy->login()){
				go('Index/yyindex');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}


	//结算异步登陆
	public function addLogins(){
		$map['username']=array('EQ',$_POST['username']);
		$data=M('user')->where($map)->find();
		if(!$data){
			$this->error('账号不存在');
		}else{
			if($data['password'] != md5($_POST['password'].$data['code'])){
				$this->error('密码不正确');
			}else{
				$data['logintime']=time();
				M('user')->save($data);
				unset($data['password']);
				unset($data['code']);
				$_SESSION['user']=$data;
				$url="{|U:'Index/Order/index'}";
				$this->success('登录成功');


			}
		}
	}
	//结算异步注册
	public function addRegs(){
		$username=Q('post.username');
		$yzm=Q('post.yzm');
		$map['username']=array('IN',$username);
		if(M('user')->where($map)->all()){
			$this->error('用户已存在');
		}
		if(strtoupper($yzm) != $_SESSION['code']){
			$this->error('验证码输入错误');
		}
		$code=md5(mt_rand(0,1000).time());
		$password=md5($_POST['password'].$code);
		$data['username']=$_POST['username'];
		$data['code']=$code;
		$data['password']=$password;
		$data['logintime']=time();
		if(M('user')->add($data)){
			$this->success('注册成功');
		}

	}

	//用户注册
	public function reg(){
		if(IS_POST){
			// print_r($_POST);exit;
			if($this->db->regAdd()){
				$this->success('注册成功正在返回首页','Index/index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}

	//验证码
	public function code(){
		$code=new Code();
		$code->show();
	}

	//用户退出
	public function out(){
		unset($_SESSION['user']);
		$this->success('退出成功','index/index');
		
	}

	public function gogo(){
		unset($_SESSION['user']);
		go('Login/yylogin');
	}
}