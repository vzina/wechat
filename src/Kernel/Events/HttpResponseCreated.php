<?php
/**
 * HttpResponseCreated.php
 * PHP version 7
 *
 * @package eyusdk_tf_new
 * @author  weijian.ye
 * @contact yeweijian@eyugame.com
 * @link    https://github.com/vzina
 */
declare (strict_types=1);

namespace EasyWeChat\Kernel\Events;

use Psr\Http\Message\ResponseInterface;

class HttpResponseCreated
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    public $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }
}
