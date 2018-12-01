<?php

/*
 * This file is part of the vzina/wechat.
 *
 * (c) vzina <yeweijian299@163.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Kernel;

use EasyWeChat\Kernel\Contracts\Arrayable;
use EasyWeChat\Kernel\Exceptions\RuntimeException;
use EasyWeChat\Kernel\Support\Arr;
use EasyWeChat\Kernel\Support\Collection;

function data_get($data, $key, $default = null)
{
    switch (true) {
        case is_array($data):
            return Arr::get($data, $key, $default);
        case $data instanceof Collection:
            return $data->get($key, $default);
        case $data instanceof Arrayable:
            return Arr::get($data->toArray(), $key, $default);
        case $data instanceof \ArrayIterator:
            $tmp = $data->getArrayCopy();
            return empty($tmp[$key]) ? $default : $tmp[$key];
        case $data instanceof \ArrayAccess:
            return empty($data[$key]) ? $default : $data[$key];
        case $data instanceof \IteratorAggregate && $data->getIterator() instanceof \ArrayIterator:
            $tmp = $data->getIterator()->getArrayCopy();
            return empty($tmp[$key]) ? $default : $tmp[$key];
        default:
            throw new RuntimeException(sprintf('Can\'t access data with key "%s"', $key));
    }
}

function data_to_array($data)
{
    switch (true) {
        case is_array($data):
            return $data;
        case $data instanceof Collection:
            return $data->all();
        case $data instanceof Arrayable:
            return $data->toArray();
        case $data instanceof \IteratorAggregate && $data->getIterator() instanceof \ArrayIterator:
            return $data->getIterator()->getArrayCopy();
        case $data instanceof \ArrayIterator:
            return $data->getArrayCopy();
        default:
            throw new RuntimeException(sprintf('Can\'t transform data to array'));
    }
}
