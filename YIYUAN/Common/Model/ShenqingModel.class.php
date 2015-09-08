<?php
class ShenqingModel extends Model{
	public $table='yisheng';

//医生申请通过
	public function Ystongguo($data){
		// print_r($_GET);exit;
			$d=$data;
			// print_r($d);exit();

			$_POST['yishengname']=$d['ys_name'];
			$_POST['keshi']=$d['ys_keshi'];
			$_POST['img']=$d['ys_img'];
			$_POST['yishengnumber']=$d['ys_number'];
			$_POST['yiyuanname']=$d['ys_yiyuan'];
			$_POST['zhuzhi']=$d['ys_zhuzhi'];
			$_POST['minzu']=$d['ys_minzu'];
			$_POST['xingbie']=$d['ys_xingbie'];
			$_POST['zhiwei']=$d['ys_zhiwei'];
		
			if ($this->add()) {
				return true;
			}else{
				$this->error="同意申请失败";
			}
	}

	public function xinxi(){
		
	}
}