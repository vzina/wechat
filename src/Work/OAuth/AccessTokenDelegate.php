<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\OAuth;

use EasyWeChat\Work\Application;
use Overtrue\Socialite\AccessTokenInterface;

/**
 * Class AccessTokenDelegate.
 *

 */
class AccessTokenDelegate implements AccessTokenInterface
{
    /**
     * @var \EasyWeChat\Work\Application
     */
    protected $app;

    /**
     * @param \EasyWeChat\Work\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Return the access token string.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->app['access_token']->getToken()['access_token'];
    }
}
