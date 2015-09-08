<?php
class YonghuyiyuanController extends Controller{

	private $db;
	private $sh;
	private $cr;

	public function __init(){
		$this->db=K('Yonghuyiyuan');
		$this->sh=M('yiyuan');
		$this->cr=K('Yhyy');
	}


    //查看申请保健医生信息
	 public function shenqing(){
	 	if (IS_POST) {
	 		// print_r($_POST);exit;
	 		// print_r($_SESSION);exit;

	 		$_SESSION['yiyuandizhi']=$_POST['yiyuandizhi'];
	 		if ($yiyuan=$this->db->shenqingYiyuan()) {
	 			// $yisheng=$this->db->chakanYisheng();
	 			$this->assign('yy',$yiyuan);
	 			$this->display('jieguo');

	 		}else{
	 			$this->error($this->db->error);
	 		}
	 	}else{
			// $yisheng=M('yisheng')->all();
			// $this->assign('ys',$yisheng);
			$this->display();
		}
	 }

	 //查看申请保健医院信息
	 public function shenqingyy(){
	 	if (IS_POST) {
	 		// print_r($_POST);exit;
	 		// print_r($_SESSION);exit;


	 		if ($yisheng=$this->db->shenqingYiyuan()) {
	 			// $yisheng=$this->db->chakanYisheng();
	 			$this->assign('yy',$yiyuan);
	 			$this->display('jieguo2');

	 		}else{
	 			$this->error($this->db->error);
	 		}
	 	}else{
			// $yisheng=M('yisheng')->all();
			// $this->assign('ys',$yisheng);
			$this->display();
		}
	 }

	 //申请存入申请表
	 public function cunru(){
	 	// $ys=$this->M('yisheng')->where("uid={$_GET['uid']}")->find();
	 	if ($this->cr->cunruy()) {
	 		$this->success('申请已发送工作人员将与您取得联系','index/yonghu');
	 	}else{
	 		$this->error($this->cr->error);
	 	}
	 }

	 //查看保健医生信息
	 public function kan(){
     if ($_GET['nid']) {
     	$yiyuan=$this->db->chakan();
     	$data=$yiyuan;
// print_r($data);exit;
     	$this->assign('data',$data);
     	$this->display();
     }else{
     	$this->error($this->db->error);
     }

	}

	//返回用户医院申请列表

	public function fanhui(){
		$yiyuan=$this->db->shenqingyiyuan();
	 	$this->assign('yy',$yiyuan);
	 	$this->display('jieguo');

	}







}