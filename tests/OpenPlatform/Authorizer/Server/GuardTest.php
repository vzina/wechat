<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\OpenPlatform\Authorizer\Server;

use EasyWeChat\Kernel\ServiceContainer;
use EasyWeChat\OpenPlatform\Authorizer\Server\Guard;
use EasyWeChat\Tests\TestCase;

/**
 * Class GuardTest.
 *
 * @author vzina <yeweijian299@163.com>
 */
class GuardTest extends TestCase
{
    public function testGetToken()
    {
        $encryptor = \Mockery::mock('stdClass');
        $encryptor->expects()->getToken()->andReturn('token');

        $app = new ServiceContainer([], [
            'encryptor' => $encryptor,
        ]);
        $guard = \Mockery::mock(Guard::class, [$app])->makePartial();

        $this->assertSame('token', $guard->getToken());
    }
}
