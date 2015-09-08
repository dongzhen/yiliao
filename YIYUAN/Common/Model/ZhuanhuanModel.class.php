<?php
class ZhuanhuanModel extends Model{
  public $table='zhuanhuan';

	public function cunru($a,$b,$c){
		$_POST=array(
			'xueya'=>$a,
			'kahao'=>$b,
			'time'=>$c
			);
			// print_r($_POST);exit;
		if ($this->add()) {
			return true;
		};
	}
}