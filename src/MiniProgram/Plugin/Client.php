<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\Plugin;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *

 */
class Client extends BaseClient
{
    /**
     * @param string $appId
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function apply($appId)
    {
        return $this->httpPostJson('wxa/plugin', [
            'action' => 'apply',
            'plugin_appid' => $appId,
        ]);
    }

    /**
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function lists()
    {
        return $this->httpPostJson('wxa/plugin', [
            'action' => 'list',
        ]);
    }

    /**
     * @param string $appId
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function unbind($appId)
    {
        return $this->httpPostJson('wxa/plugin', [
            'action' => 'unbind',
            'plugin_appid' => $appId,
        ]);
    }
}
