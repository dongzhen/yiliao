<?php
class YonghuModel extends Model{
	public $table="yonghu";

	public  function delyh(){
		if ($this->where("hid={$_GET['hid']}")->del()) {
			return true;
		}else{
			$this->error='删除失败';
		}
		
	}

	

}