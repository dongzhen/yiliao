<?php
class YonghuController extends Controller{
	private $db;

	private $yh;

	public function __init(){
		$this->db=K('Yonghu');

		$this->yh=M('yonghu')->all();
	}

	public function index(){
		$data=$this->yh;
		$this->assign('yh',$data);
		// p($data);exit;
		$this->disply();
	}

	//展现所有用户信息
	public function chuxian(){
		$this->assign('yh',$this->yh);
		$this->display();
	}

	//删除用户
	public function del(){
		if ($this->db->delyh()) {
			$this->success('删除用户成功','chuxian');
		}else{
			$this->error($this->db->error);
		}
	}
}