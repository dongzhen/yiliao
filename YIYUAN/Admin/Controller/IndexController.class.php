<?php
//后台页面
 //@author dongzhen
class IndexController extends AuthController{
        private $yh;
        private $go;
        private $xx;
           
    public function __init(){
        // if($_SESSION['user']['username']){
        //     $admin=$_SESSION['user']['username'];
        //     $this->assign('admin',$admin);
        // }
        $this->go=K('Sjsq');
         $this->yh=k('Yhxx');
         $this->xx=K('Xx');
    }
    
    //首页显示所有
    public function index(){

        $this->display();
    }
    //保健医生管理用户首页
    public function yindex(){
        $data=$this->yh->get();
        // print_r($data);exit;
        $this->assign('data',$data);
                // $this->display('Index/yindex');
        $this->display();
    }
    //保健医生管理用户首页
    public function yyindex(){
        $data=$this->yh->geta();
        $this->assign('data',$data);
        $this->display();
    }

    //给用户发送诊断信息
    public function fa(){
        $_POST['hid']=$_GET['hid'];
        if (IS_POST) {
            if ($this->xx->cunru()) {
                $this->success('信息发送成功','yindex');
            }else{
                $this->error="信息发送失败";
            }
        }else{
            $this->display();
        }
    }

    //查看用户健康信息

    public function kan(){
                $data=$this->yh->getb();
                $_SESSION['user']['kahao']=$data['kahao'];
                 // print_r($_SESSION['user']['kahao']);exit();
                $data=$this->go->sjsq();

                // print_r($data);exit;
                $_SESSION['user']['xuetang']=$data['血糖']['xuetang'];
                $_SESSION['user']['gaoya']=$data['血压']['gaoya'];
                $_SESSION['user']['diya']=$data['血压']['diya'];
                $_SESSION['user']['xinlv']=$data['血压']['xinlv'];
                // print_r($_SESSION);exit;
                $this->assign('shuju',$_SESSION['user']);
                $this->display();

    }
}
