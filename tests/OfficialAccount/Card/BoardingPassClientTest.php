<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OfficialAccount\Card;

use EasyWeChat\OfficialAccount\Card\BoardingPassClient;
use EasyWeChat\Tests\TestCase;

class BoardingPassClientTest extends TestCase
{
    public function testCheckin()
    {
        $client = $this->mockApiClient(BoardingPassClient::class);

        $params = [
            'foo' => 'bar',
        ];
        $client->expects()->httpPostJson('card/boardingpass/checkin', $params)->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->checkin($params));
    }
}
