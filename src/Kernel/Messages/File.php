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
 * Class Image.
 *
 * @property string $media_id
 */
class File extends Media
{
    /**
     * @var string
     */
    protected $type = 'file';
}
