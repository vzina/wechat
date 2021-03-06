<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Payment\Sandbox;

use EasyWeChat\Kernel\Traits\InteractsWithCache;
use EasyWeChat\Payment\Kernel\BaseClient;
use EasyWeChat\Payment\Kernel\Exceptions\SandboxException;

/**
 * Class Client.
 *

 */
class Client extends BaseClient
{
    use InteractsWithCache;

    /**
     * @return string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \EasyWeChat\Payment\Kernel\Exceptions\SandboxException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function getKey()
    {
        if ($cache = $this->getCache()->get($this->getCacheKey())) {
            return $cache;
        }

        $response = $this->request('sandboxnew/pay/getsignkey');

        if ('SUCCESS' === $response['return_code']) {
            $this->getCache()->set($this->getCacheKey(), $key = $response['sandbox_signkey'], 24 * 3600);

            return $key;
        }

        throw new SandboxException(empty($response['retmsg']) ? $response['return_msg'] : $response['retmsg']);
    }

    /**
     * @return string
     */
    protected function getCacheKey()
    {
        return 'easywechat.payment.sandbox.'.md5($this->app['config']->app_id.$this->app['config']['mch_id']);
    }
}
