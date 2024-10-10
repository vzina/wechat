<?php
/**
 * EventDispatcherServiceProvider.php
 * PHP version 7
 *
 * @package eyusdk_tf_new
 * @author  weijian.ye
 * @contact yeweijian@eyugame.com
 * @link    https://github.com/vzina
 */
declare (strict_types=1);

namespace EasyWeChat\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class EventDispatcherServiceProvider implements ServiceProviderInterface
{

    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        !isset($pimple['events']) && $pimple['events'] = function ($app) {
            $dispatcher = new EventDispatcher();

            foreach ($app->config->get('events.listen', []) as $event => $listeners) {
                foreach ($listeners as $listener) {
                    $dispatcher->addListener($event, $listener);
                }
            }

            return $dispatcher;
        };
    }
}
