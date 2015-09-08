<?php
class QingqiuController extends Controller{
	private $db;
	private $yhsq;

	public function __init(){
		$this->db=K('Qingqiu');
		$this->yhsq=K('Yhsq');
	}

	public function index(){
		$sql="SELECT * FROM yh_ysshenqing as o INNER JOIN yisheng as og ON o.uid=og.uid";
		$data=M()->query($sql);

		$this->assign('data',$data);
		
		$this->display();

	}

	//同意会员申请保健医生
	public function tongyi(){
		if ($this->db->guo()) {
			$this->yhsq->shanchu();
			$this->success('申请通过');
		}else{
			$this->error($this->db->error);
		}
	}



}
