<?php
declare (strict_types=1);

namespace EasyWeChat\MiniProgram\Midas;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use EasyWeChat\Kernel\Support\Collection;
use EyPhp\Framework\Utils\ServerTool;
use Hyperf\Utils\Arr;
use Psr\Http\Message\ResponseInterface;

/**
 * 小程序米大师
 * Class AppClient
 *
 * @author  weijian.ye
 * @see https://docs.qq.com/doc/DVUN0QWJja0J5c2x4
 */
class AppClient extends BaseClient
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
        return $this->httpPost('currency_pay', $params);
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
        $params['sign_type'] = ['pay_sig'];
        return $this->httpPost('query_user_balance', $params);
    }

    public function inSandbox(): bool
    {
        return (bool)$this->app['config']->get('sandbox');
    }

    public function getVirtualPaymentSign(array $params, string $uri = 'requestVirtualPayment')
    {
        $body = json_encode($params, JSON_UNESCAPED_UNICODE);
        $signStr = '/' . $uri . '&' . $body;
        $secret = $this->app['config']['key'] ?? '';
        $sessionKey = $this->app['config']['session_key'] ?? '';

        return [
            // @see https://developers.weixin.qq.com/minigame/dev/guide/open-ability/signature.html
            'signature' => hash_hmac('sha256', $body, $sessionKey),
            'pay_sig' => hash_hmac('sha256', $signStr, $secret),
        ];
    }
    
    public function httpPost($url, array $data = [])
    {
        $uri = $this->wrap($url);
        $signType = [];
        if (isset($data['sign_type'])) {
            $signType = (array)$data['sign_type'];
            unset($data['sign_type']);
        }
        $method = 'POST';
        $data['env'] = $this->inSandbox() ? 1 : 0;
        $signData = $this->getVirtualPaymentSign($data, $uri);

        $options = [
            'json' => $data,
            'query' => $signType ? Arr::only($signData, $signType) : $signData,
        ];

        return $this->request($uri, $method, $options);
    }
    
    /**
     * Wrapping an API endpoint.
     */
    protected function wrap(string $endpoint): string
    {
        return 'xpay/' . strtolower($endpoint);
    }
}