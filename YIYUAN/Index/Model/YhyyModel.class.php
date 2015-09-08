<?php
class YhyyModel extends Model{
	public $table='yh_yyshenqing';


	public function cunruy(){
		// p($_GET);exit;
		// print_r($yisheng);exit;
		// print_r($ys);exit;
		// print_r($_SESSION);exit;
		$_POST=array(
			'nid'=>$_GET['nid'],
			// 'hid'=>$_SESSION['user']['hid']
			'hid'=>$_SESSION['user']['hid'],
			'yhname'=>$_SESSION['user']['xingming'],
			'yhnumber'=>$_SESSION['user']['number']
			// 'ysname'=>

			);
		if ($_POST) {
					
		// print_r($_SESSION['user']['hid']);exit;
		if ($this->where("nid={$_SESSION['user']['hid']}")->find()) {
			$this->where("nid={$_SESSION['user']['hid']}")->save();
			return true;
		}else{
			$this->add();
			return true;
		}
			}
		else{
			$this->error="申请失败";


		}
		
	}
}