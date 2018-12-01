<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Message;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\Messages\Message;

/**
 * Class Client.
 *

 */
class Client extends BaseClient
{
    /**
     * @param string|\EasyWeChat\Kernel\Messages\Message $message
     *
     * @return \EasyWeChat\Work\Message\Messenger
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function message($message)
    {
        return (new Messenger($this))->message($message);
    }

    /**
     * @param array $message
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function send(array $message)
    {
        return $this->httpPostJson('cgi-bin/message/send', $message);
    }
}
