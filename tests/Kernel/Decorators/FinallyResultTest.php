<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\Kernel\Decorators;

use EasyWeChat\Kernel\Decorators\FinallyResult;
use EasyWeChat\Tests\TestCase;

class FinallyResultTest extends TestCase
{
    public function testGetContent()
    {
        $result = new FinallyResult('foo');

        $this->assertSame('foo', $result->content);
    }
}
