<?php
class XinxiController extends Controller{
	private $db;

	public function __init(){
		$this->db=K('Xinxi');
	}

	public function index(){
		// $arr= array();
		$data=$this->db->get();

		// print_r($data);exit;
		// print_r($data);exit;
		// print_r($data);exit;
		$this->assign('data',$data);
		$this->display();
	}

	//用户查看 保健医生健康信息
	public function kan(){
		$data=$this->db->geta();
		// print_r($data);exit;
		$this->assign('data',$data);
		$this->display();
	}

	//删除保健医生信息
	public function shan(){
		if ($this->db->shanchu()) {
			$this->success('删除成功','Xinxi/index');
		}else{
			$this->error($this->db->error);
		}
	}
}