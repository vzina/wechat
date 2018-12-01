<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OfficialAccount\AutoReply;

use EasyWeChat\OfficialAccount\AutoReply\Client;
use EasyWeChat\Tests\TestCase;

class ClientTest extends TestCase
{
    public function testCurrent()
    {
        $client = $this->mockApiClient(Client::class);
        $client->expects()->httpGet('cgi-bin/get_current_autoreply_info')->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->current());
    }
}
