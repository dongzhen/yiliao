<?php

/**
 * 保健医生模型
 * @author dongzhen
 */
 class YonghuyiyuanModel extends Model
 {
 	/**
 	*信息总表
 	*@var string
 	**/
 	public $table = "yiyuan";
 	// private $dl;
 	// private $sf;
 	// private $did;
 	

 	//查看对应地区保健医生
 	public function shenqingYiyuan(){
 		
 		if ($this->where("yiyuandizhi={$_SESSION['yiyuandizhi']}")->find()) {

 			
 			$yiyuan=$this->where("yiyuandizhi={$_SESSION['yiyuandizhi']}")->all();
 			 		
 			return $yiyuan;
 		}else{

 			$this->error="该地区没有保健医院";

 		}
 	}

 	//从医院数据表中读取所选择医生的信息
 	public function chakan(){
 		if ($this->where("nid={$_GET['nid']}")->find()) {
 			$yiyuan=$this->where("nid={$_GET['nid']}")->find();
 			return $yiyuan;
 		}else{
 			$this->error="无法查看医院信息";
 		}
 	}











 }
