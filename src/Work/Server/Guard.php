<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Server;

use EasyWeChat\Kernel\ServerGuard;

/**
 * Class Guard.
 *
 * @author vzina <yeweijian299@163.com>
 */
class Guard extends ServerGuard
{
    /**
     * @return bool
     */
    public function validate()
    {
        return $this;
    }

    /**
     * Check the request message safe mode.
     *
     * @return bool
     */
    protected function isSafeMode()
    {
        return true;
    }

    /**
     * @return bool
     */
    protected function shouldReturnRawResponse()
    {
        return !is_null($this->app['request']->get('echostr'));
    }
}
