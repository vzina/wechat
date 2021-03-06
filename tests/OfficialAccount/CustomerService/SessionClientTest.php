<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OfficialAccount\CustomerService;

use EasyWeChat\OfficialAccount\CustomerService\SessionClient;
use EasyWeChat\Tests\TestCase;

class SessionClientTest extends TestCase
{
    public function testList()
    {
        $client = $this->mockApiClient(SessionClient::class);

        $client->expects()->httpGet('customservice/kfsession/getsessionlist', [
            'kf_account' => 'overtrue@test',
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->lists('overtrue@test'));
    }

    public function testWaiting()
    {
        $client = $this->mockApiClient(SessionClient::class);

        $client->expects()->httpGet('customservice/kfsession/getwaitcase')->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->waiting());
    }

    public function testCreate()
    {
        $client = $this->mockApiClient(SessionClient::class);

        $client->expects()->httpPostJson('customservice/kfsession/create', [
            'kf_account' => 'overtrue@test',
            'openid' => 'mock-openid',
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->create('overtrue@test', 'mock-openid'));
    }

    public function testClose()
    {
        $client = $this->mockApiClient(SessionClient::class);

        $client->expects()->httpPostJson('customservice/kfsession/close', [
            'kf_account' => 'overtrue@test',
            'openid' => 'mock-openid',
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->close('overtrue@test', 'mock-openid'));
    }

    public function testGet()
    {
        $client = $this->mockApiClient(SessionClient::class);

        $client->expects()->httpGet('customservice/kfsession/getsession', [
            'openid' => 'mock-openid',
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->get('mock-openid'));
    }
}
