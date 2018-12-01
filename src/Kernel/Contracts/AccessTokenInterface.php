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

use Psr\Http\Message\RequestInterface;

/**
 * Interface AuthorizerAccessToken.
 *
 * @author vzina <yeweijian299@163.com>
 */
interface AccessTokenInterface
{
    /**
     * @return array
     */
    public function getToken();

    /**
     * @return \EasyWeChat\Kernel\Contracts\AccessTokenInterface
     */
    public function refresh();

    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @param array                              $requestOptions
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []);
}
