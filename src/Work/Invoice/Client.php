<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Work\Invoice;

use EasyWeChat\Kernel\BaseClient;

/**
 * Class Client.
 *

 */
class Client extends BaseClient
{
    /**
     * @param string $cardId
     * @param string $encryptCode
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function get($cardId, $encryptCode)
    {
        $params = [
            'card_id'      => $cardId,
            'encrypt_code' => $encryptCode,
        ];

        return $this->httpPostJson('cgi-bin/card/invoice/reimburse/getinvoiceinfo', $params);
    }

    /**
     * @param array $invoices
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function select(array $invoices)
    {
        $params = [
            'item_list' => $invoices,
        ];

        return $this->httpPostJson('cgi-bin/card/invoice/reimburse/getinvoiceinfobatch', $params);
    }

    /**
     * @param string $cardId
     * @param string $encryptCode
     * @param string $status
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function update($cardId, $encryptCode, $status)
    {
        $params = [
            'card_id'          => $cardId,
            'encrypt_code'     => $encryptCode,
            'reimburse_status' => $status,
        ];

        return $this->httpPostJson('cgi-bin/card/invoice/reimburse/updateinvoicestatus', $params);
    }

    /**
     * @param array  $invoices
     * @param string $openid
     * @param string $status
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function batchUpdate(array $invoices, $openid, $status)
    {
        $params = [
            'openid'           => $openid,
            'reimburse_status' => $status,
            'invoice_list'     => $invoices,
        ];

        return $this->httpPostJson('cgi-bin/card/invoice/reimburse/updatestatusbatch', $params);
    }
}
