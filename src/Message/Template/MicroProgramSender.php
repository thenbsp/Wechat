<?php

namespace Thenbsp\Wechat\Message\Template;

use Thenbsp\Wechat\Wechat\AccessToken;

/**
 * 小程序模板消息发送类
 * Class MicroProgramSender
 * @package Thenbsp\Wechat\Message\Template
 */
class MicroProgramSender extends Sender
{
    /**
     * 发送接口 URL.
     */
    const SENDER = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send';

    /**
     * 构造方法.
     */
    public function __construct(AccessToken $accessToken)
    {
        parent::__construct($accessToken);
    }
}
