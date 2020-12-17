<?php
/**
 * Created by PhpStorm.
 * User: demo
 * Date: 2020/12/17
 * Time: 13:41
 */

namespace access\lib\wechat\api;


use access\config\WeChatServiceConfig;

class AccessToken
{
    private $requestUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';

    public function __construct()
    {
        $this -> requestUrl = sprintf($this -> requestUrl ,
            WeChatServiceConfig::APP_ID , WeChatServiceConfig::APP_SECRET);
    }



}