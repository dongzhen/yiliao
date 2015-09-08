<?php
class YyshenqingModel extends Model{

  public $table="yy_shenqing";

  public function shenqing(){
        // print_r($_POST);exit;

    $data=$this->addYishengImage();

    $_POST['yy_img']=$data['yy_img'];
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
    public function addYyshengImage()
    {
        $upload = new Upload('Upload/yy_img/' . date('Y/m/d'));
        $img = $upload->upload('yy_img');
            
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
                'yy_img' => $thumb_url//缩略图
            );
      return $data;
        }
    }

}