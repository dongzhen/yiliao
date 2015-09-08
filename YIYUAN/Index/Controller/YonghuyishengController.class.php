<?php
class YonghuyishengController extends Controller{

	private $db;
	private $sh;
	private $cr;

	public function __init(){
		$this->db=K('Yonghuyisheng');
		$this->sh=M('yisheng');
		$this->cr=K('Yhys');
	}


    //查看申请保健医生信息
	 public function shenqing(){
	 	if (IS_POST) {
	 		// print_r($_POST);exit;
	 		// print_r($_SESSION);exit;

	 		$_SESSION['dizhi']=$_POST['dizhi'];
	 		if ($yisheng=$this->db->shenqingYisheng()) {
	 			// $yisheng=$this->db->chakanYisheng();
	 			$this->assign('ys',$yisheng);
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
     if ($_GET['uid']) {
     	$yisheng=$this->db->chakan();
     	$data=$yisheng;
// print_r($data);exit;
     	$this->assign('data',$data);
     	$this->display();
     }else{
     	$this->error($this->db->error);
     }

	}
       //返回用户保健医生申请保健医生查询列表
		public function fanhui(){
		$yisheng=$this->db->shenqingyisheng();
	 	$this->assign('ys',$yisheng);
	 	$this->display('jieguo');

	}







}