<?php
class ShenqingyModel extends Model{
	public $table='yiyuan';

//医生申请通过
	public function Yytongguo($data){
		// print_r($_GET);exit;
			$d=$data;
			// print_r($d);exit();

			$_POST['yiyuanname']=$d['yy_name'];
			$_POST['yiyuandizhi']=$d['yy_dizhi'];
			$_POST['yiyuanimg']=$d['yy_img'];
			$_POST['yiyuannumber']=$d['yy_number'];
			$_POST['yiyuandengji']=$d['yy_dengji'];
			$_POST['yiyuanshenqingren']=$d['yy_shenqingren'];
			$_POST['yiyuanleixing']=$d['yy_leixing'];
		
			if ($this->add()) {
				return true;
			}else{
				$this->error="同意申请失败";
			}
	}


}