<p align="center">
<h1 align="left"><a href="https://www.easywechat.com">EasyWeChat</a></h1>

## Requirement

1. PHP >= 7.2
2. **[Composer](https://getcomposer.org/)**
3. openssl 拓展
4. fileinfo 拓展（素材管理模块需要用到）

## Installation

```shell
$ composer require "vzina/wechat:~2.0" -vvv
```

## Usage

基本使用（以服务端为例）:

```php
<?php

use EasyWeChat\Factory;

$options = [
    'app_id'    => 'wx3cf0f39249eb0exxx',
    'secret'    => 'f1c242f4f28f735d4687abb469072xxx',
    'token'     => 'easywechat',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = Factory::officialAccount($options);

$server = $app->server;
$user = $app->user;

$server->push(function($message) use ($user) {
    $fromUser = $user->get($message['FromUserName']);

    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
});

$server->serve()->send();
```

hyperf(2.2以上版本)框架使用：

```php
<?php
declare (strict_types=1);

namespace Yef\WeChat;

use EasyWeChat\Kernel\Events\AccessTokenRefreshed;
use EasyWeChat\Kernel\Events\ApplicationInitialized;
use EasyWeChat\Kernel\Events\HttpResponseCreated;
use EasyWeChat\Kernel\Events\ServerGuardResponseCreated;
use Hyperf\Cache\CacheManager;
use Hyperf\Context\Context;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Str;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Factory
 *
 * @inheritDoc
 */
class Factory extends \EasyWeChat\Factory
{
    /**
     * @param string $name
     * @return \EasyWeChat\Kernel\ServiceContainer
     */
    public static function make($name, array $config = [])
    {
        $adapter = Str::snake((string)$name);
        $contextKey = 'hy.wechat.' . ($config['app_id'] ?? $adapter);

        return Context::getOrSet($contextKey, function () use ($adapter, $config) {
            $container = ApplicationContext::getContainer();

            $config = $config ?: (array)config('wechat.' . $adapter);

            $prepends = [
                // 设置hy缓存对象
                'cache' => fn() => $container->get(CacheManager::class)
                    ->getDriver($config['cache_name'] ?? 'wechat_redis_cache'),
                // 设置hy请求对象
                'request' => function () use ($container) {
                    $request = $container->get(ServerRequestInterface::class);
                    if (empty($request)) {
                        return Request::createFromGlobals();
                    }

                    return Request::create(
                        (string)$request->getUri(),
                        $request->getMethod(),
                        $request->getQueryParams(),
                        $request->getCookieParams(),
                        $request->getUploadedFiles(),
                        $request->getServerParams(),
                        (string)$request->getBody()->getContents()
                    );
                },
            ];

            // 设置hy监听事件
            $listener = fn($event) => $container->get(EventDispatcherInterface::class)->dispatch($event);
            Arr::set($config, 'events.listen', [
                AccessTokenRefreshed::class => [$listener],
                ApplicationInitialized::class => [$listener],
                HttpResponseCreated::class => [$listener],
                ServerGuardResponseCreated::class => [$listener],
            ]);

            $namespace = Str::studly($adapter);
            $application = "\\EasyWeChat\\{$namespace}\\Application";

            $app = new $application($config, $prepends);

            return $app;
        });
    }

    public static function __callStatic($name, $arguments)
    {
        return static::make($name, ...$arguments);
    }
}
```

更多请参考 [https://www.easywechat.com/](https://www.easywechat.com/)。

## Documentation

[官网](https://www.easywechat.com)  · [教程](https://www.easywechat.com/tutorials)  ·  [讨论](https://www.easywechat.com/discussions)  ·  [微信公众平台](https://mp.weixin.qq.com/wiki)  ·  [WeChat Official](http://admin.wechat.com/wiki)

## License

MIT
