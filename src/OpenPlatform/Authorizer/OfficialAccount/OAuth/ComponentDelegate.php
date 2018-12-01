<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OpenPlatform\Authorizer\OfficialAccount\OAuth;

use EasyWeChat\OpenPlatform\Application;
use Overtrue\Socialite\WeChatComponentInterface;

/**
 * Class ComponentDelegate.
 *

 */
class ComponentDelegate implements WeChatComponentInterface
{
    /**
     * @var \EasyWeChat\OpenPlatform\Application
     */
    protected $app;

    /**
     * ComponentDelegate Constructor.
     *
     * @param \EasyWeChat\OpenPlatform\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->app['config']['app_id'];
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->app['access_token']->getToken()['component_access_token'];
    }
}
