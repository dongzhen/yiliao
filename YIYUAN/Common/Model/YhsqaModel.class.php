<?php
class YhsqaModel extends Model{

	public $table='yh_yyshenqing';
	// print_r($_GET['uid']);exit;
	// 同意用户保健医生申请事删除yu_shenqing表申请
	public function shanchu(){
		$this->where("nid={$_GET['nid']}")->del();
	}

}