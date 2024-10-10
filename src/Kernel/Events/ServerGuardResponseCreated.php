<?php
/**
 * ServerGuardResponseCreated.php
 * PHP version 7
 *
 * @package eyusdk_tf_new
 * @author  weijian.ye
 * @contact yeweijian@eyugame.com
 * @link    https://github.com/vzina
 */
declare (strict_types=1);

namespace EasyWeChat\Kernel\Events;

use Symfony\Component\HttpFoundation\Response;

class ServerGuardResponseCreated
{
    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    public $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
