<?php
// 管理用户模型
class UserModel extends Model{
	// 用户表
public $table='user';

    //添加用户
    public function addUser(){
		if ($this->add()) {
			return true;
		}else{
			$this->error="添加失败";
		} 
    }
	//删除用户
	public function delUser(){
		if ($this->where("uid={$_GET['uid']}")->del()) {
			return true;
		}else{
			$this->error="帐号删除失败";
		}		
	} 

		public function get(){
		$us=$this->where("uid={$_GET['uid']}")->find();
		return $us;
	}



}