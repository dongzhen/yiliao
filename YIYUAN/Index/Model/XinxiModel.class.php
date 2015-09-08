<?php
class XinxiModel extends Model{
	public $table="xinxi";

	public function get(){
		$data=$this->where("hid={$_SESSION['user']['hid']}")->order("xid desc")->all();
		return $data;
	}

	//读取保健医生信息
	public function geta(){
		$data=$this->where("xid={$_GET['xid']}")->find();
		return $data;
	}

	//删除保健医生信息
	public function shanchu(){
		if ($this->where("xid={$_GET['xid']}")->del()) {
			return true;
		}else{
			$this->error="信息删除失败";
		}
	}
}