<?php

namespace exception;

class SaldoInsuficienteException extends \Exception
{

    private $valor;
    private $saldo;

    public function __construct($message , $valor, $saldo )
//    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->valor = $valor ;
        $this->saldo = $saldo ;

        parent::__construct($message, null, null);
    }
//    public function __construct($message, $code ,$ex )
//    {
//        parent::__construct($message, $code, $ex);
//    }

    public function __get($param)
    {
        return $this->$param;
    }


}