<?php
class YiyuanController extends Controller{
	// 模型
	private $db;
	private $yiyuan;
	// private $daili;

	// 自动加载函数
	public function __init(){
		// db对象模型
		$this->db=K('Yiyuan');
		// 医院表
		$this->yiyuan=M('yiyuan')->all();
	}

	//医院列表
	public function index(){
		$data=$this->yiyuan;
		// print_r($yiyuan);exit;
		$this->assign('data',$data);
		$this->display();
	}


	//添加保健医院
	public function add(){ 
		if (IS_POST) {								
			if ($this->db->addYiyuan()) {

				$this->success('添加医院成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}

	// //修改保健医院信息
	// public function edit(){
	// 	if ($this->db->editYiyuan()) {
	// 		$this->success('修改成功','index');
	// 	}else{
	// 		$this->error($this->db->error);
	// 	}
	// }

		//编辑保健医院
	public function edit(){
		if (IS_POST) {
			
			if ($this->db->editYiyuan()) {
				$this->success('修改成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$yy=$this->db->get();
			// $shengfen=$this->sheng;
			$this->assign('y',$yy);
			// $this->assign('sf',$shengfen);
			// print_r($daili);exit;
			$this->display();
		} 
	}

	//与保健医院解除合作关系
	public function del(){
		if ($this->db->delYiyuan()) {
			$this->success('已于该医院解除合作关系','index');
		}else{
			$this->error($this->db->error);
		}
	}

	//查看保健医院
	 public function chakan(){
	 	if (IS_POST) {
	 		// print_r($_POST);exit;

	 		if ($yiyuan=$this->db->chakanYiyuan()) {
	 			// $yisheng=$this->db->chakanYisheng();
	 			$this->assign('yy',$yiyuan);
	 			$this->display('jieguo');

	 		}else{
	 			$this->error('该地区暂无保健医院','chakan');
	 		}
	 	}else{
			$yiyuan=M('yiyuan')->all();
			$this->assign('yy',$yiyuan);
			$this->display();
		}
	 }

}