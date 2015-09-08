	<?php
	/**
 * 保健医生模型
 * @author dongzhen
 */
class YishengController extends AuthController{
	//模型
	private $db;
	private $yisheng;
	private $ys;
	// private $daili;

	public function __init(){
		//db对象属性
		$this->db=K('Yisheng');

		$this->ys=M('yisheng')->all();

		$this->yisheng=M('yisheng')->all();

	}

	// 保健医生列表
	public function index(){
		$data=$this->yisheng;
		// print_r($data);exit;
		$this->assign('data',$data);
		$this->display();

	}

	//添加保健医生
	public function add(){
		if (IS_POST){
			if ($this->db->addYisheng()) {
				$this->success('添加成功','index');
			}else{
				$this->error('添加失败','index');
			}
	}else{

		$this->display();
	}
				}

    //查看保健医生信息
	 public function chakan(){
	 	if (IS_POST) {
	 		// print_r($_POST);exit;

	 		if ($yisheng=$this->db->chakanYisheng()) {
	 			// $yisheng=$this->db->chakanYisheng();
	 			$this->assign('ys',$yisheng);
	 			$this->display('jieguo');

	 		}else{
	 			$this->error('该地区暂无保健医生','chakan');
	 		}
	 	}else{
			$yisheng=M('yisheng')->all();
			$this->assign('ys',$yisheng);
			$this->display();
		}
	 }

	
	//删除保健医生
	public function del(){
		if ($this->db->delYisheng()) {
			$this->success("合作关系解除成功",'index');
		}else{
			$this->error($this->db->error);
		}
	}

	//编辑保健医生
	public function edit(){
		if (IS_POST) {
			
			if ($this->db->editYisheng()) {
				$this->success('修改成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$ys=$this->db->get();
			// $shengfen=$this->sheng;
			$this->assign('y',$ys);
			// $this->assign('sf',$shengfen);
			// print_r($daili);exit;
			$this->display();
		} 
	}

	//医生价格选择
	public function jiage(){
		if (IS_POST) {
			if ($this->db->jjiage()) {
				$this->success('价格调整成功','yindex');
			}else{
				$this->error($this->db->error);
			}
				}else{
				$ys=$this->ys;
				$this->assign('ys',$ys);
				// p($ys);exit;
				$this->display();
		}
	}



}