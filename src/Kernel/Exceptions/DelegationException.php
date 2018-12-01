<?php
namespace EasyWeChat\Kernel\Exceptions;

use Exception;

class DelegationException extends Exception
{
    /**
     * @var string
     */
    protected $exception;
    /**
     * @param string $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
        return $this;
    }
    /**
     * @return string
     */
    public function getException()
    {
        return $this->exception;
    }
}
