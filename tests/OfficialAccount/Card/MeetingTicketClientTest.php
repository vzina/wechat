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

use EasyWeChat\OfficialAccount\Card\MeetingTicketClient;
use EasyWeChat\Tests\TestCase;

class MeetingTicketClientTest extends TestCase
{
    public function testUpdateUser()
    {
        $client = $this->mockApiClient(MeetingTicketClient::class);

        $params = [
            'foo' => 'bar',
        ];
        $client->expects()->httpPostJson('card/meetingticket/updateuser', $params)->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->updateUser($params));
    }
}
