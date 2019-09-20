<?php


class Validacao{

    public static function protegeAtributo($atributo){
        if($atributo == "titular" || $atributo == "saldo"){
            throw new Exception("Oatributo $atributo continua privado");
        }
    }

    public static function verificaNumero($valor){
        if(!is_numeric($valor)){
            throw new InvalidArgumentException("O tipo passado não é um numero valido");
//            throw new Exception("O tipo passado não é um numero valido");
//            echo "O valor passado não é numero";
//            exit;
        }
    }

    public static function verificaNumeroNegativo($valor)
    {
        if ($valor < 0){
            throw new Exception("O valor não é permitido");
        }
    }


}