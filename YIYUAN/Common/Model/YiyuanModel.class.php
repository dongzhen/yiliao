<?php
// 医院管理模型
class YiyuanModel extends Model{
	public $table="yiyuan";

	// 添加代理医院
	public function addYiyuan(){


		if ($this->add()) {
			return true;
		}else{
			$this->error="添加失败";
		} 
	}

	//解除医院关系
	public function delYiyuan(){
		if ($this->where("nid={$_GET['nid']}")->del()) {
			return true;
		}else{
			$this->error="合作关系解除失败";
		}
	}

 	// 保健医生信息修改
 	public function editYiyuan(){
 		// print_r($_POST);exit;
 		$this->where("nid={$_GET['nid']}")->find();
 		// $sname=$this->sf->where("sid={$_POST['pid']}")->find();
 		$yisheng=$this->where("nid={$_GET['nid']}");		// $_POST['sname']=$sname['sname'];
 		if ($this->where("nid={$_GET['nid']}")->save()) {
 			return true;
 		}else{
 			$this->error="保健医院信息修改失败";
 		}
 	}

	//查看保健医院
 	//查看对应地区保健医生
 	public function chakanYiyuan(){
 		
 		if (isset($_POST['yiyuandizhi'])) {

 			$yiyuan=$this->where("yiyuandizhi={$_POST['yiyuandizhi']}")->all();
 			// $yiyuan=$this->where("shiname={$_POST['shiname']}")->all();
 			// print_r($yiyuan);exit;
 			 		
 			return $yiyuan;
 		}else{

 			$this->error="查找失败";

 		}
 	}


 	 public function get(){
 		$yy=$this->where("nid={$_GET['nid']}")->find();
 		return $yy;
 	}

}