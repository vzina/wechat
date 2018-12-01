<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\BasicService;

use EasyWeChat\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @author vzina <yeweijian299@163.com>
 *
 * @property \EasyWeChat\BasicService\Jssdk\Client           $jssdk
 * @property \EasyWeChat\BasicService\Media\Client           $media
 * @property \EasyWeChat\BasicService\QrCode\Client          $qrcode
 * @property \EasyWeChat\BasicService\Url\Client             $url
 * @property \EasyWeChat\BasicService\ContentSecurity\Client $content_security
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Jssdk\ServiceProvider::class,
        QrCode\ServiceProvider::class,
        Media\ServiceProvider::class,
        Url\ServiceProvider::class,
        ContentSecurity\ServiceProvider::class,
    ];
}
