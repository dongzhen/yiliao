<?php

/**
 * 保健医生模型
 * @author dongzhen
 */
 class YonghuyishengModel extends Model
 {
 	/**
 	*信息总表
 	*@var string
 	**/
 	public $table = "yisheng";
 	// private $dl;
 	// private $sf;
 	// private $did;
 	

 	//查看对应地区保健医生
 	public function shenqingYisheng(){
 		
 		if ($this->where("dizhi={$_SESSION['dizhi']}")->find()) {

 			
 			$yisheng=$this->where("dizhi={$_SESSION['dizhi']}")->all();
 			 		
 			return $yisheng;
 		}else{

 			$this->error="该地区没有保健医生";

 		}
 	}


 	 	//从医生数据表中读取所选择医生的信息
 	public function chakan(){
 		if ($this->where("uid={$_GET['uid']}")->find()) {
 			$yiyuan=$this->where("uid={$_GET['uid']}")->find();
 			return $yiyuan;
 		}else{
 			$this->error="无法查看医生信息";
 		}
 	}










 }
