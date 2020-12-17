<?php
/**
 * Created by PhpStorm.
 * User: demo
 * Date: 2020/12/17
 * Time: 15:41
 */

namespace access\lib\wechat;


use access\lib\common\Common;

class User
{
    private $requestUrl = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';


    public function __construct($token , $openId)  {
        $this -> requestUrl = sprintf($this -> requestUrl , $token , $openId);
    }

    public function getUserInfo()
    {
        $requeset = new Common();
        $apiResults = $requeset -> httpRequest($this ->requestUrl);
        $apiResults = json_decode($apiResults , true);
        var_dump($apiResults);
        exit;
    }
}