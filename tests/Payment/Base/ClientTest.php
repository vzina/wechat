<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\Payment\Base;

use EasyWeChat\Payment\Application;
use EasyWeChat\Payment\Base\Client;
use EasyWeChat\Tests\TestCase;

class ClientTest extends TestCase
{
    public function testPay()
    {
        $app = new Application(['app_id' => 'mock-appid']);

        $client = $this->mockApiClient(Client::class, ['pay'], $app)->makePartial();

        $order = [
            'appid' => 'mock-appid',
            'foo' => 'bar',
        ];

        $client->expects()->request('pay/micropay', $order)->andReturn('mock-result');
        $this->assertSame('mock-result', $client->pay($order));
    }

    public function testAuthCodeToOpenid()
    {
        $app = new Application(['app_id' => 'mock-appid']);

        $client = $this->mockApiClient(Client::class, 'authCodeToOpenId', $app)->makePartial();

        $client->expects()->request('tools/authcodetoopenid', [
            'appid' => 'mock-appid',
            'auth_code' => 'foo',
            ])->andReturn('mock-result');

        $this->assertSame('mock-result', $client->authCodeToOpenid('foo'));
    }
}
