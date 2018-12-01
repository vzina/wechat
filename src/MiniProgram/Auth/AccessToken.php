<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\Auth;

use EasyWeChat\Kernel\AccessToken as BaseAccessToken;

/**
 * Class AccessToken.
 *

 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var string
     */
    protected $endpointToGetToken = 'https://api.weixin.qq.com/cgi-bin/token';

    /**
     * {@inheritdoc}
     */
    protected function getCredentials()
    {
        return [
            'grant_type' => 'client_credential',
            'appid' => $this->app['config']['app_id'],
            'secret' => $this->app['config']['secret'],
        ];
    }
}
