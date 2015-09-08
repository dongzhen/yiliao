<?php
class YhxxModel extends Model{
	public $table='yonghu';

	public function get(){
		// print_r()
		$data=$this->where("uid={$_SESSION['user']['uid']}")->all();
		// print_r($data);exit;
		return $data;
	}

	public function geta(){
		// print_r($_SESSION);exit();
		

			$data=$this->where("nid={$_SESSION['user']['nid']}")->all();
			return $data;
		
		
	}

}