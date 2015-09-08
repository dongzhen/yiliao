<?php
header("Content-type:text/html;charset=utf-8");
class SjsqModel extends Model{
	public $table='shuju_info';

    // 用户数据登陆对应测量数据读取
	public function sjsq(){
		// print_r($_SESSION['kahao']);exit();
		$a= "10".strtoupper(dechex($_SESSION['user']['kahao']));
		// print_r($_SESSION['kahao']);exit;
		$data=$this->where("CardCode='$a'")->all();

		foreach ($data as $key => $da) {
			$newarr=array();
			//用户当天血糖测量数值
			if (substr($da['Data'],0,2)==20) {
				$x=substr($da['Data'], 2,4);
				// $newarr=array();
				foreach ($da as $k => $d) {
					$k='血糖';
					$newaar[$k]['xuetang']=hexdec($x)/18;	
					// $a=hexdec($x);
					// $xuetang=$a/18;
					$xuetang=$newaar[$k]['xuetang'];
					$newaar[$k]['xuetang']=number_format($xuetang,2);
					// $xuetang=number_format($xuetang,2);
					// $newexdec($x);
					// $newarr[$k]['xuetang']=$xuetang;	
					unset($data[$k]);	
							}			
					}
					// print_r($newarr[$k]['xuetang']);exit;

			// 用户当天血压测量数值
			if (substr($da['Data'],0,2)==21) {
				$a=substr($da['Data'], 2,2);
				$b=substr($da['Data'], 4,2);
				$c=substr($da['Data'], 6,2);				
				// print_r($x);exit;
				// 高压数据截取
				$gaoya="0x".$a;
				// print_r($gaoya);exit;
				// 低压数据截取
				$diya="0x".$b;
				//心率数据截取
				$xinlv="0x".$c;

				// $x=substr($da['Data'], 2,4);
				// $newarr=array();
				foreach ($data as $k => $d) {
					$k='血压';
					// $newaar[$k]=$d;
					$newaar[$k]['gaoya']=hexdec($gaoya);
					$newaar[$k]['diya']=hexdec($diya);
					$newaar[$k]['xinlv']=hexdec($xinlv);	
					// $a=hexdec($x);
					// $xueya=$a/18;
					// $xueya=number_format($xueya,2);
					// $newexdec($x);
					// $newarr[$k]=$xueya;	
					unset($data[$k]);

							}
							// print_r($newaar['血压']);exit;			
					}


		}
		// $newarr['血糖']['xuetang']=$newarr[$k]['xuetang'];
		$data=$newaar;
		// print_r($data);exit;

// print_r($newaar);exit;
		return $data;

		}
		

	
}