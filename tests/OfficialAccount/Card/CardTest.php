<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Test\OfficialAccount\Card;

use EasyWeChat\OfficialAccount\Application;
use EasyWeChat\OfficialAccount\Card\BoardingPassClient;
use EasyWeChat\OfficialAccount\Card\Card;
use EasyWeChat\OfficialAccount\Card\Client;
use EasyWeChat\OfficialAccount\Card\CodeClient;
use EasyWeChat\OfficialAccount\Card\CoinClient;
use EasyWeChat\OfficialAccount\Card\GeneralCardClient;
use EasyWeChat\OfficialAccount\Card\JssdkClient;
use EasyWeChat\OfficialAccount\Card\MeetingTicketClient;
use EasyWeChat\OfficialAccount\Card\MemberCardClient;
use EasyWeChat\OfficialAccount\Card\MovieTicketClient;
use EasyWeChat\OfficialAccount\Card\SubMerchantClient;
use EasyWeChat\Tests\TestCase;

class CardTest extends TestCase
{
    public function testBasicProperties()
    {
        $app = new Application();
        $card = new Card($app);

        $this->assertInstanceOf(Client::class, $card);
        $this->assertInstanceOf(BoardingPassClient::class, $card->boarding_pass);
        $this->assertInstanceOf(MeetingTicketClient::class, $card->meeting_ticket);
        $this->assertInstanceOf(MovieTicketClient::class, $card->movie_ticket);
        $this->assertInstanceOf(CoinClient::class, $card->coin);
        $this->assertInstanceOf(MemberCardClient::class, $card->member_card);
        $this->assertInstanceOf(GeneralCardClient::class, $card->general_card);
        $this->assertInstanceOf(CodeClient::class, $card->code);
        $this->assertInstanceOf(SubMerchantClient::class, $card->sub_merchant);
        $this->assertInstanceOf(JssdkClient::class, $card->jssdk);

        try {
            $card->foo;
            $this->fail('No expected exception thrown.');
        } catch (\Exception $e) {
            $this->assertSame('No card service named "foo".', $e->getMessage());
        }
    }
}
