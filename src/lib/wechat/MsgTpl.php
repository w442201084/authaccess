<?php


namespace access\lib\wechat;


use access\config\WeChatServiceConfig;
use access\lib\common\Common;

class MsgTpl
{
    private $requestUrl = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=%s';

    public function __construct($accessToken)
    {
        $this -> requestUrl = sprintf($this -> requestUrl , $accessToken);
    }

    public function sendMsg($tplData)
    {
        $apiResults = ( new Common() ) -> httpRequest($this -> requestUrl , 'post' , $tplData);
        return $apiResults;
    }
}