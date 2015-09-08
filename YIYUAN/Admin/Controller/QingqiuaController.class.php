<?php
class QingqiuaController extends Controller{
	private $db;
	private $yhsq;

	public function __init(){
		$this->db=K('Qingqiua');
		$this->yhsq=K('Yhsqa');
	}

	public function index(){
		$sql="SELECT * FROM yh_yyshenqing as o INNER JOIN yiyuan as og ON o.nid=og.nid";
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
