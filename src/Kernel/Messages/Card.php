<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Card.php.
 *
 * @author    vzina <yeweijian299@163.com>
 * @copyright 2015 vzina <yeweijian299@163.com>
 *
 * @see      https://github.com/overtrue
 * @see      http://overtrue.me
 */

namespace EasyWeChat\Kernel\Messages;

/**
 * Class Card.
 */
class Card extends Message
{
    /**
     * Message type.
     *
     * @var string
     */
    protected $type = 'wxcard';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = ['card_id'];

    /**
     * Media constructor.
     *
     * @param string $cardId
     */
    public function __construct($cardId)
    {
        parent::__construct(['card_id' => $cardId]);
    }
}
