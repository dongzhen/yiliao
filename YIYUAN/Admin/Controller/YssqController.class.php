<?php
class YssqController extends Controller{

  private $db;

  private $shenqing;

  public function __init(){
  	$this->db=K('Yssq');
    $this->shenqing=K('Shenqing');
  }


  // 查看申请保健医生名单
  public function index(){

  	$data=$this->db->get();

  	$this->assign('data',$data);

  	$this->display();
  }

  //保健医生申请通过
  public function tongguo(){
      // print_r($_GET);exit;
    $data=$this->db->getys();
      if($this->shenqing->Ystongguo($data)){

        if ($this->db->shanchu($data)) {
         $this->success('申请通过','index');
        }else{
          $this->error('申请通过失败','index');
        }
        
      }else{
        $this->error($this->db->error);
      }
  }

  //医生申请删除
  public function del(){
    if ($this->db->delit()) {
      $this->success('删除信息成功','index');
    }else{
      $this->error($this->db->error);
    }
  }

  //查看申请保健医生详细信息
  public function xinxi(){
      $data=$this->db->xinxi();
    if ($this->db->xinxi()) {
     
      // print_r($data);exit;
      // print_r($data);exit;
      $this->assign('data',$data);
      $this->display();
    }else{
      $this->error('保健医生信息查看失败','index');
    }

  }

}