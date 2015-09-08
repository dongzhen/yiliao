<?php
class UserController extends Controller{
	// 定义模型
	private $db;
	private $user;
	public function __init(){
		$this->user=M('user')->all();
		$this->db= K('User');
	}

	// 显示总代理帐号管理信息
	public function index(){
		$data=$this->user;
		$this->assign('data',$data);
		$this->display();
	}

	//添加帐号密码
	public function add(){
		if (IS_POST) {
			if ($this->db->addUser()) {
				$this->success('帐号添加成功','index');
			}else{
				$this->error('帐号添加失败','index');
			}
		}else{
			$this->display();
		}
	}

	//删除总代理帐号
	public function del(){
		if ($this->db->delUser()) {
			$this->success('修改成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
	//修改账号
	public function edit(){
		if (IS_POST) {			
			if ($this->db->editUser()) {
				$this->success('修改成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$us=$this->db->get();
			// $shengfen=$this->sheng;
			$this->assign('u',$us);
			// $this->assign('sf',$shengfen);
			// print_r($daili);exit;
			$this->display();
		} 
	}



}