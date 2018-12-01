<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\BasicService\ContentSecurity;

use EasyWeChat\BasicService\ContentSecurity\Client;
use EasyWeChat\Tests\TestCase;

class ClientTest extends TestCase
{
    public function testCheckText()
    {
        $client = $this->mockApiClient(Client::class, 'checkText')->shouldAllowMockingProtectedMethods();
        $client->shouldDeferMissing();

        $client->expects()->httpPostJson('msg_sec_check', [
            'content' => 'foo',
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->checkText('foo'));
    }

    public function testCheckImage()
    {
        $client = $this->mockApiClient(Client::class, 'checkImage')->shouldAllowMockingProtectedMethods();
        $client->shouldDeferMissing();

        $imagePath = 'foo';

        $client->expects()->httpUpload('img_sec_check', [
            'media' => $imagePath,
        ])->andReturn('mock-result')->once();

        $this->assertSame('mock-result', $client->checkImage($imagePath));
    }
}
