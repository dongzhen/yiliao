<?php
class YsshenqingModel extends Model{

	public $table="ys_shenqing";

	public function shenqing(){
        // print_r($_POST);exit;
        if ($_POST['xingbie']==1) {
            $_POST['xingbie']='男';
        }else{
            $_POST['xingbie']='女';
        }

		$data=$this->addYishengImage();

		$_POST['ys_img']=$data['ys_img'];
		// p($_POST);exit;
		// print_r($_POST);exit;
		if ($this->add()) {
			return true;
		}else{
			$this->error="申请失败";
		}
	}



		    /**	    
     * 医生申请照片添加
     * @param 
     */
    public function addYishengImage()
    {
        $upload = new Upload('Upload/ys_img/' . date('Y/m/d'));
        $img = $upload->upload('ys_img');
            
        /**
         * 没有图片上传时
         */
        if (empty($img)) {
            return;
        }

        $image = new Image();

        foreach ($img as $file) {

            //小图 50x50
            $thumb_url = $file['dir'] . $file['filename'] . '_index_108x206.' . $file['ext'];
            $image->thumb($file['path'], $thumb_url, 108, 206,1);
            $data = array(
                'ys_img' => $thumb_url//缩略图
            );
			return $data;
        }
    }

}