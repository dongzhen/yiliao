<?php
class DelysModel extends Model{
	public $table='ys_shenqing';

	public function shanchu($b){
		print_r($b);exit;
		if ($this->del('ys_id=$b')) {
			return true;
		}else{
			$this->error="同意申请失败";
		}
	}

}