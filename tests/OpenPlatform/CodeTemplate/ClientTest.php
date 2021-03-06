<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OpenPlatform\CodeTemplate;

use EasyWeChat\OpenPlatform\CodeTemplate\Client;
use EasyWeChat\Tests\TestCase;

class ClientTest extends TestCase
{
    public function testGetDrafts()
    {
        $client = $this->mockApiClient(Client::class, []);

        $client->expects()->httpGet('wxa/gettemplatedraftlist')->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->getDrafts());
    }

    public function testCreateFromDraft()
    {
        $client = $this->mockApiClient(Client::class, []);

        $client->expects()->httpPostJson('wxa/addtotemplate', ['draft_id' => 123])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->createFromDraft(123));
    }

    public function testList()
    {
        $client = $this->mockApiClient(Client::class, []);

        $client->expects()->httpGet('wxa/gettemplatelist')->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->lists());
    }

    public function testDelete()
    {
        $client = $this->mockApiClient(Client::class, []);

        $client->expects()->httpPostJson('wxa/deletetemplate', ['template_id' => 234])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->delete(234));
    }
}
