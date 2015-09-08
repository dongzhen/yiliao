<?php
header("Content-type:text/html;charset=utf-8");
class YhController extends Controller{
	private $db;

	public function __init(){
		$this->db=K('Yonghuxinxi');
	}

	 //用户详细信息完善
	 public function wanshan(){
	 	if (IS_POST) {
	 		if ($this->db->wanshanxinxi()) {
	 			$data=$this->db->get();
	 			$this->assign('data',$data);
	 			$this->success('信息完善成功','Index/yonghu');
	 		}else{
	 			$this->error($this->db->error);
	 		}
	 	}else{
	 		$data=$this->db->get();
	 		// print_r($data);exit;
	 		$this->assign('data',$data);
	 		$this->display();
	 	}
	 }
}