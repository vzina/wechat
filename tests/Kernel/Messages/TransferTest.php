<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\Kernel\Messages;

use EasyWeChat\Kernel\Messages\Transfer;
use EasyWeChat\Tests\TestCase;

class TransferTest extends TestCase
{
    public function testToXmlArray()
    {
        $message = new Transfer();
        $this->assertSame([], $message->toXmlArray());

        $message = new Transfer('overtrue@test');
        $this->assertSame([
            'TransInfo' => [
                'KfAccount' => 'overtrue@test',
            ],
        ], $message->toXmlArray());
    }
}
