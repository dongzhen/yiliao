<?php
/**
 * 后台登录验证处理类
 * @author dongzhen
 */
class AuthController extends Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->checkUser()){
			$this->error('请登录后操作...',U('Admin/login/login'));
			exit;
		}
	}
	//后台登录验证
	private function checkUser(){
		return isset($_SESSION['user']) && isset($_SESSION['user']['uid']);
	}
}