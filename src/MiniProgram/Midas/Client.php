<?php
declare (strict_types=1);

namespace EasyWeChat\MiniProgram\Midas;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use EasyWeChat\Kernel\Support\Collection;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 *
 * @author  weijian.ye
 * @see https://docs.qq.com/doc/DVUN0QWJja0J5c2x4
 */
class Client extends BaseClient
{
    /**
     * midas.pay
     *
     * @return ResponseInterface|Collection|array|object|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function pay(array $params)
    {
        return $this->httpPost(__FUNCTION__, $params);
    }

    /**
     * midas.getBalance
     *
     * @param array $params
     * @return array|Collection|object|ResponseInterface|string
     * @throws InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author  weijian.ye
     */
    public function getBalance(array $params)
    {
        return $this->httpPost(__FUNCTION__, $params);
    }

    public function inSandbox(): bool
    {
        return (bool)$this->app['config']->get('sandbox');
    }

    public function httpPost($url, array $data = [])
    {
        $url = $this->wrap($url);
        $method = 'POST';
        $data['appid'] = $data['appid'] ?? $this->app['config']['app_id'];
        $data['offer_id'] = $data['offer_id'] ?? $this->app['config']['offer_id'];
        $data['ts'] = time();
        $data['pf'] = 'android';
        $data['env'] = $this->inSandbox() ? 1 : 0;

        // $data['user_ip'] = ServerTool::clientIp();
        $body = json_encode($data, JSON_UNESCAPED_UNICODE);
        $signStr = '/' . $url . '&' . $body;
        $secret = $this->app['config']['key'] ?? '';
        $sessionKey = $this->app['config']['session_key'] ?? '';

        $options = [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => $body,
            'query' => [
                // @see https://developers.weixin.qq.com/minigame/dev/guide/open-ability/signature.html
                'signature' => hash_hmac('sha256', $body, $sessionKey),
                'pay_sig' => hash_hmac('sha256', $signStr, $secret),
            ],
        ];

        return $this->request($url, $method, $options);
    }

    /**
     * Wrapping an API endpoint.
     */
    protected function wrap(string $endpoint): string
    {
        return 'wxa/game/' . strtolower($endpoint);
    }
}