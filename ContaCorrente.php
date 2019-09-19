<?php

class ContaCorrente{

    private $titular;
    public $agencia;
    private $numero;
    private $saldo;

    public function __construct($titular,$agencia,$numero,$saldo){

        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;

    }

    public function sacar($valor)
    {
        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar($valor)
    {
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function transferir($valor, $contaCorente)
    {
        if(!is_numeric($valor)){
            throw new Exception("O tipo passado não é um numero valido");
        }

        $this->sacar($valor);

        $contaCorente->depositar($valor);

        return $this;
    }

    public function __get($atributo)
    {
        $this->protegeAtributo($atributo);

        return $this->$atributo;
    }

    public function __set($atributo,$valor)
    {
        $this->protegeAtributo($atributo);

        $this->$atributo = $valor;

        return $this->$atributo;
    }

    private function protegeAtributo($atributo)
    {
     if($atributo == "titular"  || $atributo == "saldo"){
         throw new  Exception("O atributo $atributo continua privado");
     }

    }
    public function setNumero($numero){
        return $this->numero = $numero;
    }

    public function formataSaldo(){
        return "R$".number_format($this->saldo,2,",",".");
    }

    public function getSaldo(){
        return $this->formataSaldo();
    }

}