<?php
/*
 * This file is part of the EasyWeChatComposer.
 *
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace EasyWeChat\Kernel\Traits;

use EasyWeChat\Kernel\BaseClient;
use EasyWeChat\Kernel\Delegation\DelegationTo;
use EasyWeChat\Kernel\Delegation\EasyWeChat;

trait WithAggregator
{
    /**
     * Aggregate.
     */
    protected function aggregate()
    {
        foreach (EasyWeChat::config() as $key => $value) {
            $this['config']->set($key, $value);
        }
    }
    /**
     * @return bool
     */
    public function shouldDelegate($id)
    {
        return $this['config']->get('delegation.enabled')
        && $this->offsetGet($id) instanceof BaseClient;
    }
    /**
     * @return $this
     */
    public function shouldntDelegate()
    {
        $this['config']->set('delegation.enabled', false);
        return $this;
    }
    /**
     * @param string $id
     *
     * @return \EasyWeChatComposer\Delegation
     */
    public function delegateTo($id)
    {
        return new DelegationTo($this, $id);
    }
}
