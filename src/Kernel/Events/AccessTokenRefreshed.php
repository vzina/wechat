<?php
/**
 * AccessTokenRefreshed.php
 * PHP version 7
 *
 * @package eyusdk_tf_new
 * @author  weijian.ye
 * @contact yeweijian@eyugame.com
 * @link    https://github.com/vzina
 */
declare (strict_types=1);

namespace EasyWeChat\Kernel\Events;

use EasyWeChat\Kernel\AccessToken;

class AccessTokenRefreshed
{
    /**
     * @var \EasyWeChat\Kernel\AccessToken
     */
    public $accessToken;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }
}
