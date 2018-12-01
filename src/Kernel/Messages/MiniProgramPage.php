<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Kernel\Messages;

/**
 * Class MiniProgramPage.
 */
class MiniProgramPage extends Message
{
    protected $type = 'miniprogrampage';

    protected $properties = [
        'title',
        'appid',
        'pagepath',
        'thumb_media_id',
    ];

    protected $required = [
        'thumb_media_id', 'appid', 'pagepath',
    ];
}
