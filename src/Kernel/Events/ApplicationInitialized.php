<?php
/**
 * ApplicationInitialized.php
 * PHP version 7
 *
 * @package eyusdk_tf_new
 * @author  weijian.ye
 * @contact yeweijian@eyugame.com
 * @link    https://github.com/vzina
 */
declare (strict_types=1);

namespace EasyWeChat\Kernel\Events;

use EasyWeChat\Kernel\ServiceContainer;

class ApplicationInitialized
{
    /**
     * @var \EasyWeChat\Kernel\ServiceContainer
     */
    public $app;

    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }
}
