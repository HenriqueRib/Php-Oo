<?php

//require "exception/SaldoInsuficienteException.php"; manualmente sem o autoload

use exception\SaldoInsuficienteException;

class ContaCorrente{

    private $titular;
    public $agencia;
    private $numero;
    private $saldo;
    public static $totalDeContas;
    public static $taxaOperacao;
    public $totalSaquesNaoPermitidos = 0 ;
    public static $operacaoNaoRealizada;

    public function __construct($titular,$agencia,$numero,$saldo){

        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;

        self::$totalDeContas ++;
        try{
            if(self::$totalDeContas <1) {
                throw new Exception("Valor digitado não é dividido por zero");
            }
            self::$taxaOperacao = (30 / self::$totalDeContas);
//            self::$taxaOperacao = intDiv(30, self::$totalDeContas);  intDiv calcula numero inteiros e retorna nume inteiros.Por isso não seria legal usalo.
        }catch (Exception $erro) {
            echo $erro->getMessage();
            exit;
        }

    }

    public function __get($atributo)
    {
        Validacao::protegeAtributo($atributo);
        return $this->$atributo;
    }

    public function __set($atributo,$valor)
    {
        Validacao::protegeAtributo($atributo);
//        $this->protegeAtributo($atributo);
//        $this->$atributo = $valor;
        return $this->$atributo;
    }

    public function transferir($valor,ContaCorrente  $contaCorente)
    {
        try{

            $arquivo = new LeitorArquivo("logTransferencia.txt");

            $arquivo->abrirArquivo();
            $arquivo->escreverNoArquivo();

            Validacao::verificaNumero($valor);
            Validacao::verificaNumeroNegativo($valor);
//        if(!is_numeric($valor)){
////            throw new Exception("O tipo passado não é um numero valido");
//            echo "O valor passado não é numero";
//            exit;
//        }

            if($valor > $this->saldo){
//        if($this->saldo <= 0 || $this->saldo < $valor){
                throw new SaldoInsuficienteException("Saldo insuficiente .", $valor , $this->saldo);
            }

            $this->sacar($valor);
            $contaCorente->depositar($valor);

            $arquivo->fecharArquivo();
            return $this;
        }catch (\Exception $e){
            ContaCorrente::$operacaoNaoRealizada ++;
            throw new exception\OperacaoNaoRealizadaException("Operação não realizada", 55,$e);
        }finally{
            $arquivo->fecharArquivo();
        }
    }

    public static function calculaTaxaOperacao(){
        try{
//            self::$taxaOperacao = 30 / self::$totalDeContas;
            self::$taxaOperacao = intDiv(30, self::$totalDeContas);
        }catch (Error $erro){
            echo "Não é possível realizar divisão por zero";
            exit;

//        catch(\DivisionByZeroError $error){
//                echo $error->getMessage()."<br>";
//                exit();
//            }
        }

//        self::$taxaOperacao = (30 / self::$totalContasCriadas);

    }



    public function getTitular()
    {
        return $this->titular;
    }





    public function sacar($valor)
    {
        Validacao::verificaNumero($valor);
//        (new Validacao)->verificaNumero($valor);
        if($valor > $this->saldo){
            throw new SaldoInsuficienteException("Saldo insuficiente");
    }

        $this->saldo = $this->saldo - $valor;
        return $this;
    }

    public function depositar($valor){
    {
        Validacao::verificaNumero($valor);
        $this->saldo = $this->saldo + $valor;
        return $this;
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

//    private function protegeAtributo($atributo)
//    {
//        if ($atributo == "titular" || $atributo == "saldo") {
//            throw new  Exception("O atributo $atributo continua privado");
//        }
//    }


}