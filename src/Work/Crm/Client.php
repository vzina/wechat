<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Crm;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *

 */
class Client extends BaseClient
{
    /**
     * @param string $externalUserId
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function getExternalContact($externalUserId)
    {
        return $this->httpGet('cgi-bin/crm/get_external_contact', [
            'external_userid' => $externalUserId,
        ]);
    }
}
