<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OfficialAccount\ShakeAround;

use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\OfficialAccount\ShakeAround\MaterialClient;
use EasyWeChat\Tests\TestCase;

class MaterialClientTest extends TestCase
{
    public function testUploadImage()
    {
        $client = $this->mockApiClient(MaterialClient::class);

        $path = STUBS_ROOT.'/files/image.png';

        $client->expects()->httpUpload('shakearound/material/add', ['media' => $path], [], ['type' => 'icon'])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->uploadImage($path));

        $client->expects()->httpUpload('shakearound/material/add', ['media' => $path], [], ['type' => 'cover'])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->uploadImage($path, 'cover'));

        // invalid path
        $path = '/not/exists/path/to/image.jpg';
        $this->expectExceptionMessage(sprintf('File does not exist, or the file is unreadable: "%s"', $path));
        $this->expectException(InvalidArgumentException::class);
        $client->uploadImage($path);
    }
}
