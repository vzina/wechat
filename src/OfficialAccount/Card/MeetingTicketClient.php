<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\OfficialAccount\Card;

/**
 * Class MeetingTicketClient.
 *
 * @author vzina <yeweijian299@163.com>
 */
class MeetingTicketClient extends Client
{
    /**
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     */
    public function updateUser(array $params)
    {
        return $this->httpPostJson('card/meetingticket/updateuser', $params);
    }
}
