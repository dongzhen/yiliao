<?php

// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |   Version: 2013.03
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <houdunwangxj@gmail.com>
// | Copyright (c) 2012-2013, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------
final class Token
{

    public static $key = "houdunwang.com";

    /**
     * 创建令牌
     */
    static function create()
    {
        /**
         * 令牌已经存在时不重复生成
         */
        if (session(C("TOKEN_NAME"))) {
            return session(C("TOKEN_NAME"));
        }
        /**
         * 生成令牌
         */
        $k = self::$key . mt_rand(1, 10000) . NOW . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'];
        session(C("TOKEN_NAME"), md5($k));
    }

    /**
     * 验证令牌
     * session中储存的令牌与用户提交的令牌一致时为验证通过
     */
    static function check()
    {
        /**
         * 开启令牌验证时进行验证
         */
        if (C("TOKEN_ON")) {
            return session(C("TOKEN_NAME")) == Q(C("TOKEN_NAME"));
        } else {
            return true;
        }
    }

}
