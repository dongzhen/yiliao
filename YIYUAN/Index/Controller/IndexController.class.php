<?php
//测试控制器类
class IndexController extends Controller{
private $db;
private $go;
 private $yh;
 private $xx;

	public function __init(){
		$this->db=K('User');
		$this->go=K('Sjsq');
		 $this->yh=k('Yhxx');
		 $this->xx=K('Xx');
	}


    // 动作方法
    public function index(){
		if(IS_POST){
			if($this->db->loginUser()){
				// p($_SESSION['user']);exit;
				// print_r($this->go->sjsq());exit;
				$data=$this->go->sjsq();
				// print_r($data);exit;
				// print_r($data);exit;
				// $data=M('shuju_info')->all();
				// $sql="SELECT * FROM shuju_info as s INNER JOIN yonghu as y ON s.CardCode=y.kahao";
				// $data=M()->query($sql);
				// $newarr = array();
				// foreach ($data as $k => $d) {
				// 		// $d['CardCode']=substr($d['CardCode'],2,8);
				// 	    $k =hexdec($d['CardCode']);
    //     				$newarr[$k] = $d;
    //     				unset($data[$k]);
				// }
				// print_r($newarr);exit;

				
				// $sql="SELECT * FROM shuju_info as s INNER JOIN yonghu as y ON s.CardCode=y.kahao";
				// $data=M()->query($sql);

				// print_r($data);exit;
				$_SESSION['user']['xuetang']=$data['血糖']['xuetang'];
				$_SESSION['user']['gaoya']=$data['血压']['gaoya'];
				$_SESSION['user']['diya']=$data['血压']['diya'];
				$_SESSION['user']['xinlv']=$data['血压']['xinlv'];
				// print_r($_SESSION['xuetang']);exit;
				$this->assign('user',$_SESSION['user']);
				$this->success('登陆成功','Index/yonghu');
			}else{
				$this->error($this->db->error);
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


        //给用户发送诊断信息
    public function fa(){
        $_POST['hid']=$_GET['hid'];
        if (IS_POST) {
            if ($this->xx->cunru()) {
                $this->success('信息发送成功','yyindex');
            }else{
                $this->error="信息发送失败";
            }
        }else{
            $this->display();
        }
    }

    
    
    public function yonghu()
{
	$this->assign('shuju',$_SESSION['user']);
	$this->display();
}
    //保健医生管理用户首页
    public function yyindex(){
        $data=$this->yh->geta();
        $this->assign('data',$data);
        $this->display();
    }

//用户注册
	public function reg(){
		if(IS_POST){
			// print_r($_POST);exit;
			if($this->db->regAdd()){
				$this->success('注册成功正在返回首页','Index/index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}


	//验证码
	public function code(){
		$code=new Code();
		$code->show();
	}

	//用户退出
	public function out(){
		unset($_SESSION['user']);
		$this->success('退出成功','index/index');
		
	}

	// //查看用户信息
	// public function kan(){
	// 	$this->db->get();
	// 	$data=$this->db->get();
	// 	$this->display();
	// }

}
