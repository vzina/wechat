<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\MiniProgram\Wxa;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * @param string $openid
     * @param string $content
     * @param int $scene
     * @param array $options
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @see https://developers.weixin.qq.com/minigame/dev/api-backend/open-api/wxa-sec-check/gamesecurity.msgSecCheck.html
     */
    public function msgSecCheck(string $openid, string $content, int $scene = 4, array $options = [])
    {
        return $this->httpPostJson($this->wrap('msg_sec_check'), array_merge($options, [
            'content' => $content,
            'scene' => $scene,
            'openid' => $openid,
            'version' => 2,
        ]));
    }

    public function mediaCheckAsync(string $openid, string $content, int $mediaType = 2, int $scene = 4)
    {
        return $this->httpPostJson($this->wrap('media_check_async'), [
            'media_url' => $content,
            'media_type' => $mediaType,
            'scene' => $scene,
            'openid' => $openid,
            'version' => 2,
        ]);
    }

    /**
     * 校验服务器所保存的登录态 session_key 是否合法
     *
     * @param string $openid
     * @param string $sessionKey
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @see https://developers.weixin.qq.com/minigame/dev/api-backend/open-api/login/auth.checkSessionKey.html
     */
    public function checkSessionKey(string $openid, string $sessionKey)
    {
        return $this->httpGet($this->wrap('checksession'), [
            'signature' => hash_hmac('sha256', '', $sessionKey),
            'openid' => $openid,
            'sig_method' => 'hmac_sha256',
        ]);
    }

    public function generate(string $query = '', string $path = '', int $expireTime = 0, string $envVersion = 'release')
    {
        $params = [
            'jump_wxa' => [
                'path' => $path,
                'query' => $query,
                'env_version' => $envVersion,
            ],
        ];

        if ($expireTime > 0 && $expireTime <= 30) {
            $params['expire_type'] = 1;
            $params['expire_interval'] = $expireTime;
        } else {
            $params['expire_type'] = 0;
            $params['expire_time'] = $expireTime ?: (time() + 30 * 86400);
        }

        return $this->httpPostJson($this->wrap('generatescheme'), $params);
    }

    /**
     * Wrapping an API endpoint.
     */
    protected function wrap(string $endpoint): string
    {
        return 'wxa/' . strtolower($endpoint);
    }
}
