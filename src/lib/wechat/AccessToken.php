<?php
/**
 * Created by PhpStorm.
 * User: demo
 * Date: 2020/12/17
 * Time: 15:10
 */

namespace access\lib\wechat;

use access\config\WeChatServiceConfig;
use access\lib\common\Common;

class AccessToken
{
    private $requestUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code';

    public function __construct($code)
    {
        $this -> requestUrl = sprintf($this -> requestUrl ,
            WeChatServiceConfig::APP_ID , WeChatServiceConfig::APP_SECRET , $code);
    }

    public function getAccessToken()
    {
        $handle = new Common();
        $results = $handle -> httpRequest($this -> requestUrl);
        $results = json_decode($results , true);
        if( !empty($results['access_token']) ) {
            return $results['access_token'];
        } else {
            throw new \Exception("获取access_token失败，{$results['errmsg']}" , 100001);
        }
    }

}