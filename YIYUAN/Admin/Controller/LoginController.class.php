<?php
/**
 * 后台登录验证处理类
 * @author dongzhen
 */
class LoginController extends Controller{
	private $db;
	private $yy;
	// private $yyy;

	public function __init(){
		$this->db= K('Login');
		$this->yy=K('Ylogin');
		$this->yyy=K('Yylogin');
	}

	//后台登录
	public function login(){
		if(IS_POST){
			if($this->db->login()){
				go('Index/index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}
	//保健医生登录
	public function ylogin(){
		if (IS_POST) {
			if($this->yy->login()){
				go('Index/yindex');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}
		//保健医院登录
	// public function yylogin(){
	// 	if (IS_POST) {
	// 		if($this->yyy->login()){
	// 			go('Index/yyindex');
	// 		}else{
	// 			$this->error($this->db->error);
	// 		}
	// 	}else{
	// 		$this->display();
	// 	}
	// }


	//验证码
	public function code(){
		$ob=new Code;
		$ob->show();
	}

	//退出
	public function out(){
		unset($_SESSION['user']);
		go('Login');
	}

	public function gogo(){
		unset($_SESSION['user']);
		go('Login/ylogin');
	}
}