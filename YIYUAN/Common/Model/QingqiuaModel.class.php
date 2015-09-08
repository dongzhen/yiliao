<?php
class QingqiuaModel extends Model{
	public $table="yonghu";


	public function guo(){
		$_POST=array(
			'nid'=>$_GET['nid'],
			// 'hid'=>$_SESSION['user']['hid']
			// 'hid'=>$_SESSION['user']['hid'],
			// 'yhname'=>$_SESSION['user']['xingming'],
			// 'yhnumber'=>$_SESSION['user']['number']
			// 'ysname'=>

			);
		if ($this->where("hid={$_GET['hid']}")->save()) {
			return $_GET['nid'];
		}else{
			$this->error="同意申请失败";
		}
	}
}