<?php

/**
 * 保健医生模型
 * @author dongzhen
 */
 class YishengModel extends Model
 {
 	/**
 	*信息总表
 	*@var string
 	**/
 	public $table = "yisheng";
 	// private $dl;
 	// private $sf;
 	// private $did;
 	


 	// 添加保健医生 
 	public function addYisheng(){
 		// print_r($_POST);exit;
 		// $_POST["sname"]=$_POST["pid"];
 		// $sname=$this->dl->where("sid={$_POST['pid']}")->find();		
 		// $_POST["sname"]=$sname["sname"]; 
 		// $this->dljia();
 		if ( $this->add()) {
 			return true;
 		}else{

 			$this->error="失败";
 		}

 	}

 	// public function dljia(){
 	// 	$did=$this->where("pid={$_POST['pid']}")->find();

 	// 	$_POST['username']=$_POST['dkey'];
 	// 	$_POST['password']=$_POST['dpassword'];
 	// 	$_POST['did']=$did['did'];
 	// 	// $_POST['did']=$_POST['did'];
 	// 	M('user')->add();

 	// }

 	//删除保健医生
 	public function delYisheng(){
 		// print_r($_GET['did']);exit;
 		if ($this->where("uid={$_GET['uid']}")->del()) {
 			return true;
 		}else{
 			$this->error="代理权限取消失败";
 		}
 	}

 	// 保健医生信息修改
 	public function editYisheng(){
 		// print_r($_POST);exit;
 		$this->where("uid={$_GET['uid']}")->find();
 		// $sname=$this->sf->where("sid={$_POST['pid']}")->find();
 		$yisheng=$this->where("uid={$_GET['uid']}");		// $_POST['sname']=$sname['sname'];
 		if ($this->where("uid={$_GET['uid']}")->save()) {
 			return true;
 		}else{
 			$this->error="保健医生信息修改失败";
 		}
 	}

 	//查看对应地区保健医生
 	public function chakanYisheng(){
 		
 		if (isset($_POST['dizhi'])) {

 			$yisheng=$this->where("dizhi={$_POST['dizhi']}")->all();
 			// $yisheng=$this->where("shiname={$_POST['shiname']}")->all();
 			 		
 			return $yisheng;
 		}else{

 			$this->where("quname={$_POST['quname']}")->find();
 			$yisheng=$this->where("quname={$_POST['quname']}")->all();
 			return $yisheng;

 		}
 	}

 	// //对应代理商份责任姓名查询
 	// public function cuserSheng(){
 	// 	if ($this->where("duser={$_POST['duser']}")->all()) {
 	// 		$du=$this->where("duser={$_POST['duser']}")->all();
 	// 		return $du;
 	// 	}else{
 	// 		$this->error="对应省份代理查询失败";
 	// 	}
 	// }

 	public function get(){
 		$ys=$this->where("uid={$_GET['uid']}")->find();
 		return $ys;
 	}


 }
 