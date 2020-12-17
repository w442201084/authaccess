<?php
/**
 * Created by PhpStorm.
 * User: demo
 * Date: 2020/12/17
 * Time: 19:19
 */

namespace access\lib\wechat;

use access\config\WeChatServiceConfig;
use access\lib\common\Common;

/**
 * @desc 获取全局access_token
 * Class GlobalAccessToken
 * @package access\lib\wechat
 */
class GlobalAccessToken
{
    private $requestUrl = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';

    public function __construct(){
        $this -> requestUrl = sprintf($this -> requestUrl , WeChatServiceConfig::APP_ID , WeChatServiceConfig::APP_SECRET);
    }

    /**
        $accessToken = new GlobalAccessToken();
        $token = $accessToken -> getGlobalAccessToken();
        if($token['access_token']) {
            $user = new User($token['access_token'] , 'oOmVn5seW0rnwygK1wP_Xbn4z1T4');
            $info = $user -> getUserInfo();
        }
     * @desc access_token需要存入缓存
     * @return mixed
     * @throws \Exception
     */
    public function getGlobalAccessToken(){
        $handle = new Common();
        $results = $handle -> httpRequest($this -> requestUrl);
        $results = json_decode($results , true);
        if(!empty($results['access_token']) ) {
            return $results;
        } else {
            throw new \Exception("获取access_token失败，{$results['errmsg']}" , 100001);
        }
    }
}