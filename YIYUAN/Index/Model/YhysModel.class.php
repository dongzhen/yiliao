<?php
class YhysModel extends Model{
	public $table='yh_ysshenqing';


	// public function cunruy(){
	// 	// p($_GET);exit;
	// 	// print_r($yisheng);exit;
	// 	// print_r($ys);exit;
	// 	$_POST=array(
	// 		'uid'=>$_GET['uid'],
	// 		// 'hid'=>$_SESSION['user']['hid']
	// 		'hid'=>$_SESSION['user']['hid'],
	// 		'yhname'=>$_SESSION['user']['xingming'],
	// 		'yhnumber'=>$_SESSION['user']['number']
	// 		// 'ysname'=>

	// 		);
	// 	// print_r($_SESSION['user']['hid']);exit;
	// 	if ($this->where("hid={$_SESSION['user']['hid']}")->save()) {
	// 		return true;
	// 	}else{
	// 		$this->error="申请失败";


	// 	}
		
	// }



		public function cunruy(){
		// p($_GET);exit;
		// print_r($yisheng);exit;
		// print_r($ys);exit;
		$_POST=array(
			'uid'=>$_GET['uid'],
			// 'hid'=>$_SESSION['user']['hid']
			'hid'=>$_SESSION['user']['hid'],
			'yhname'=>$_SESSION['user']['xingming'],
			'yhnumber'=>$_SESSION['user']['number']
			// 'ysname'=>

			);
		if ($_POST) {
					
		// print_r($_SESSION['user']['hid']);exit;
		if ($this->where("hid={$_SESSION['user']['hid']}")->find()) {
			$this->where("hid={$_SESSION['user']['hid']}")->save();
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