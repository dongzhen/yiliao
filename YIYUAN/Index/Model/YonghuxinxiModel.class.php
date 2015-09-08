<?php
class YonghuxinxiModel extends Model{
	public $table='yonghu';
	// 获得用户已经填写信息
	public function get(){
		// print_r($_SESSION);exit;
		$data=$this->where("kahao={$_SESSION['user']['kahao']}")->find();
		return $data;
	}

	//用户信息完善
	public function wanshanxinxi(){
		if ($this->where("kahao={$_SESSION['user']['kahao']}")->save()) {
			return true;
		}else{
			$this->error="信息存入失败";
		}
	}
}