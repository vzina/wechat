<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OpenPlatform\Auth;

use EasyWeChat\Kernel\Exceptions\RuntimeException;
use EasyWeChat\Kernel\Traits\InteractsWithCache;
use EasyWeChat\OpenPlatform\Application;

/**
 * Class VerifyTicket.
 *

 */
class VerifyTicket
{
    use InteractsWithCache;

    /**
     * @var \EasyWeChat\OpenPlatform\Application
     */
    protected $app;

    /**
     * Constructor.
     *
     * @param \EasyWeChat\OpenPlatform\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Put the credential `component_verify_ticket` in cache.
     *
     * @param string $ticket
     *
     * @return $this
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setTicket($ticket)
    {
        $this->getCache()->set($this->getCacheKey(), $ticket, 3600);

        return $this;
    }

    /**
     * Get the credential `component_verify_ticket` from cache.
     *
     * @return string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\RuntimeException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getTicket()
    {
        if ($cached = $this->getCache()->get($this->getCacheKey())) {
            return $cached;
        }

        throw new RuntimeException('Credential "component_verify_ticket" does not exist in cache.');
    }

    /**
     * Get cache key.
     *
     * @return string
     */
    protected function getCacheKey()
    {
        return 'easywechat.open_platform.verify_ticket.'.$this->app['config']['app_id'];
    }
}
