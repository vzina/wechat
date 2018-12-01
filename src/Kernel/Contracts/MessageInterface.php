<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Kernel\Contracts;

/**
 * Interface MessageInterface.
 *
 * @author vzina <yeweijian299@163.com>
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return mixed
     */
    public function transformForJsonRequest();

    /**
     * @return string
     */
    public function transformToXml();
}
