<?php

// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.01
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------
/**
 * Class Download
 * 远程文件下载
 */
class Download
{

    //错误信息
    private $error = ':(下载出错了';

    public function __construct()
    {
    }

    /**
     * 获取错误信息
     * @return type
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 远程下载文件
     * @param $url 远程地址
     * @param string $file 保存路径
     * @param int $timeout 超时时间
     * @return bool|mixed|string
     */
    public function download($url, $file = '', $timeout = 60)
    {
        if (empty($url)) {
            $this->error = '下载地址为空！';
            return false;
        }
        //提取文件名
        $filename = pathinfo($url, PATHINFO_BASENAME);
        if ($file && is_dir($file)) {
            //构造存储名称
            $file = $file . $filename;
        } else {
            //提取文件名
            $file = empty($file) ? $filename : $file;
            //提取目录名
            $dir = pathinfo($file, PATHINFO_DIRNAME);
            //目录不存在时创建
            !is_dir($dir) && mkdir($dir, 0755, true);
            $url = str_replace(" ", "%20", $url);
        }
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $temp = curl_exec($ch);
            if (file_put_contents($file, $temp) && !curl_error($ch)) {
                return $file;
            } else {
                return false;
            }
        } else {
            //PHP 5.3 兼容
            if (PHP_VERSION >= '5.3') {
                $userAgent = $_SERVER['HTTP_USER_AGENT'];
                $opts = array(
                    "http" => array(
                        "method" => "GET",
                        "header" => $userAgent,
                        "timeout" => $timeout)
                );
                $context = stream_context_create($opts);
                $res = copy($url, $file, $context);
            } else {
                $res = copy($url, $file);
            }
            if ($res) {
                return $file;
            }
            return false;
        }
    }

}
