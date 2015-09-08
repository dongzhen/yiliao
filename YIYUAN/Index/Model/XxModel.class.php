<?php
class XxModel extends Model{
	public $table='xinxi';


	public function cunru(){
		// $data=time();
		// $time=strtotime(date('Y-m-d H:i:s'));
		// print_r($time);exit;
		$_POST['shijian']=time();
		$this->add();
		return true;
	}
}