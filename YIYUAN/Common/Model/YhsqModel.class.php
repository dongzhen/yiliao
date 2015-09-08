<?php
class YhsqModel extends Model{

	public $table='yh_ysshenqing';
	// print_r($_GET['uid']);exit;
	// 同意用户保健医生申请事删除yu_shenqing表申请
	public function shanchu(){
		$this->where("uid={$_GET['uid']}")->del();
	}

}