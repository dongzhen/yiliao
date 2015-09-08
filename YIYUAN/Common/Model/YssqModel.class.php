<?php
class YssqModel extends Model{

  public $table="ys_shenqing";

  public function get(){
  	$data=M('ys_shenqing')->order("ys_id desc")->all();
  	return $data;
  }


  public function getys(){
  	$data=$this->where("ys_id={$_GET['ys_id']}")->find();
  	return $data;
  }
// 保健医生申请后通过 删除预存内容
 	public function shanchu($b){
		// print_r($b);exit;
		if ($this->del("ys_id={$b['ys_id']}")) {
			return true;
		}else{
			$this->error="同意申请失败";
		}
	}
  //删除保健医生申请
  public function delit(){
    if ($this->where("ys_id={$_GET['ys_id']}")->del()) {
     return true;
    }else{
      $this->error="以上申请删除失败";
    }
  }
//保健医生申请信息查看
  public function xinxi(){
    // if ($this->where("ys_id={$_GET['ys_id']}")->find()) {
      $data=$this->where("ys_id={$_GET['ys_id']}")->find();
      if ($data['ys_xingbie']==1) {
        $data['ys_xingbie']="男";
      }
      if ($data['ys_xingbie']==2) {
        $data['ys_xingbie']="女";
      }
      if ($data['ys_keshi']==1) {
        $data['ys_keshi']="五官科";
      }
       if ($data['ys_keshi']==2) {
        $data['ys_keshi']="内科";
      }
      if ($data['ys_keshi']==3) {
        $data['ys_keshi']="外科";
      }
      if ($data['ys_keshi']==4) {
        $data['ys_keshi']="妇产科";
      }
      if ($data['ys_keshi']==5) {
        $data['ys_keshi']="心理门诊";
      }
      if ($data['ys_keshi']==6) {
        $data['ys_keshi']="放射科";
      }
            // print_r($data);exit;
      return $data;

    // }else{
    //   $this->error="查看信息失败";
    // }

  }




}
