<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\BasicService;

use EasyWeChat\OfficialAccount\Application;
use EasyWeChat\Tests\TestCase;

class ApplicationTest extends TestCase
{
    public function testProperties()
    {
        $app = new Application();

        $this->assertInstanceOf(\EasyWeChat\BasicService\Media\Client::class, $app->media);
        $this->assertInstanceOf(\EasyWeChat\BasicService\Url\Client::class, $app->url);
        $this->assertInstanceOf(\EasyWeChat\BasicService\QrCode\Client::class, $app->qrcode);
        $this->assertInstanceOf(\EasyWeChat\BasicService\Jssdk\Client::class, $app->jssdk);
    }
}
