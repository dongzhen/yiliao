<?php
class ShujuController extends Controller{
	// private $db;
	private $shuju;

	public function __init(){
		// $this->db=k('Shuju');

		$this->shuju=M('ShuJu_Info')->all();
		
		// print_r($this->shuju);exit;
	}

	public function index(){

		$this->assign('data',$this->shuju);

		$this->display();
	}
}