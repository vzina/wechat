<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\Work\Message;

use EasyWeChat\Tests\TestCase;
use EasyWeChat\Work\Message\Client;
use EasyWeChat\Work\Message\Messenger;

class ClientTest extends TestCase
{
    public function testMessage()
    {
        $client = $this->mockApiClient(Client::class);

        $this->assertInstanceOf(Messenger::class, $client->message('hello'));
    }

    public function testSend()
    {
        $client = $this->mockApiClient(Client::class);

        $client->expects()->httpPostJson('cgi-bin/message/send', ['foo' => 'bar'])->andReturn('mock-result');

        $this->assertSame('mock-result', $client->send(['foo' => 'bar']));
    }
}
