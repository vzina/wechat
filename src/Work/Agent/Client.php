<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Agent;

use EasyWeChat\Kernel\BaseClient;

/**
 * This is WeWork Agent Client.
 *

 */
class Client extends BaseClient
{
    /**
     * Get agent.
     *
     * @param int $agentId
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function get($agentId)
    {
        $params = [
            'agentid' => $agentId,
        ];

        return $this->httpGet('cgi-bin/agent/get', $params);
    }

    /**
     * Set agent.
     *
     * @param int   $agentId
     * @param array $attributes
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function set($agentId, array $attributes)
    {
        return $this->httpPostJson('cgi-bin/agent/set', array_merge(['agentid' => $agentId], $attributes));
    }

    /**
     * Get agent list.
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function lists()
    {
        return $this->httpGet('cgi-bin/agent/list');
    }
}
