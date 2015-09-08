<?php
class ZhuanhuanController extends Controller{

	private $shuju;

	// private $db;

	private $zhuanhuan;
	public function __init(){
		// $this->db=K('Zhuanhuan');
		$this->shuju=M('shuju_info')->all();
		// $this->zhuanhuan=M('zhuanhuan')->all();
	}


	//测量数据判断数据类型 和转换
	public function index(){
		$data=$this->shuju;
		// print_r($data);exit;
		foreach ($data as  $k=>$d) {
		
		$x=substr($d['Data'], 2,4);
		// 对传入测量数值类型进行分析列：血压，血糖。。。

		// 血糖判断
		if (substr($d['Data'], 0,2)==20) {
			$a=hexdec($x);
			$xueya=$a/18;
			$shuju[$k]['xueya']=number_format($xueya,2);
		}
		//血压判断
		if (substr($d['Data'], 0,2)==21) {
			// 高压数据截取
			$gaoya="0x".substr($d['Data'],2,2);
			// 低压数据截取
			$diya="0x".substr($d['Data'], 4,2);
			//心率数据截取
			$xinlv="0x".substr($d['Data'], 6,2);
			$shuju[$k]['gaoya']=hexdec($gaoya);
			$shuju[$k]['diya']=hexdec($diya);
			$shuju[$k]['xinlv']=hexdec($xinlv);

		}
		$d['CardCode']=hexdec(substr($d['CardCode'],2,8));
		$shuju[$k]['CardCode']=$d['CardCode'];
		$shuju[$k]['DataTime']=$d['DataTime'];		
		// return $shuju;
		
	}
	// print_r($shuju);exit;
		$this->assign('data',$shuju);
		// print_r(expression)
		$this->display();
}




}