<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OpenPlatform\Authorizer\MiniProgram;

use EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Application;
use EasyWeChat\Tests\TestCase;

class ApplicationTest extends TestCase
{
    public function testProperties()
    {
        $app = new Application(['app_id' => 'app-id']);

        $this->assertInstanceOf(\EasyWeChat\OpenPlatform\Authorizer\MiniProgram\Account\Client::class, $app->account);
    }
}
