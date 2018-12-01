<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\BasicService\Url;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author vzina <yeweijian299@163.com>
 */
class Client extends BaseClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://api.weixin.qq.com/';

    /**
     * Shorten the url.
     *
     * @param string $url
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function shorten($url)
    {
        $params = [
            'action' => 'long2short',
            'long_url' => $url,
        ];

        return $this->httpPostJson('cgi-bin/shorturl', $params);
    }
}
