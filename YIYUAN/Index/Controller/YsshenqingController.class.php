<?php
class YsshenqingController extends Controller{

  private $db;
  private $shenqing;

  public function __init(){
  	$this->db=K('Ysshenqing');
  	$this->shenqing=M('ys_shenqing')->all();
  }


  public function index(){ 

  	if (IS_POST) {

  		if ($this->db->shenqing()) {
  			$this->success('申请成功客服两个工作日内将与您联系');
  		}else{
  			$this->error($this->db->error);
  		}
  	}else{
  	 $this->display();
  	}
  }


}