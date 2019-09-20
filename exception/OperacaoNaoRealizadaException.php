<?php


namespace exception;


use Throwable;

class OperacaoNaoRealizadaException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return $this->getCode() . ":" . $this->getMessage();
//        parent::__toString();
    }

}