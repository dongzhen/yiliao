<?php
class YysqModel extends Model{

  public $table="yy_shenqing";

  public function get(){
  	$data=M('yy_shenqing')->order("yy_id desc")->all();
  	return $data;
  }


  public function getyy(){
  	$data=$this->where("yy_id={$_GET['yy_id']}")->find();
  	return $data;
  }
// 保健医生申请后通过 删除预存内容
 	public function shanchu($b){
		// print_r($b);exit;
		if ($this->del("yy_id={$b['yy_id']}")) {
			return true;
		}else{
			$this->error="同意申请失败";
		}
	}
  //删除保健医生申请
  public function delit(){
    if ($this->where("yy_id={$_GET['yy_id']}")->del()) {
     return true;
    }else{
      $this->error="以上申请删除失败";
    }
  }
//保健医生申请信息查看
  public function xinxi(){
    // if ($this->where("ys_id={$_GET['ys_id']}")->find()) {
      $data=$this->where("yy_id={$_GET['yy_id']}")->find();
            // print_r($data);exit;
      return $data;

    // }else{
    //   $this->error="查看信息失败";
    // }

  }




}
