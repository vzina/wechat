<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OfficialAccount\ShakeAround;

use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;

/**
 * Class Card.
 *
 * @author vzina <yeweijian299@163.com>
 *
 * @property \EasyWeChat\OfficialAccount\ShakeAround\DeviceClient   $device
 * @property \EasyWeChat\OfficialAccount\ShakeAround\GroupClient    $group
 * @property \EasyWeChat\OfficialAccount\ShakeAround\MaterialClient $material
 * @property \EasyWeChat\OfficialAccount\ShakeAround\RelationClient $relation
 * @property \EasyWeChat\OfficialAccount\ShakeAround\StatsClient    $stats
 */
class ShakeAround extends Client
{
    /**
     * @param string $property
     *
     * @return mixed
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["shake_around.{$property}"])) {
            return $this->app["shake_around.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No shake_around service named "%s".', $property));
    }
}
