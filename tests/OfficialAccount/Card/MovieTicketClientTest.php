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

use EasyWeChat\OfficialAccount\Card\MovieTicketClient;
use EasyWeChat\Tests\TestCase;

class MovieTicketClientTest extends TestCase
{
    public function testUpdateUser()
    {
        $client = $this->mockApiClient(MovieTicketClient::class);

        $client->expects()->httpPostJson('card/movieticket/updateuser', ['foo' => 'bar'])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->updateUser(['foo' => 'bar']));
    }
}
