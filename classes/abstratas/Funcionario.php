<?php

namespace classes\abstratas;

abstract class Funcionario
{
    public $nome;
    public $cpf;
    protected $salario;
    const piso = 1097.20;

    public function __construct($cpf,$salario = self::piso)
    {
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

   abstract public function getBonificacao();

    final public function aumentaSalario()
    {
         $this->salario *= 1.5;
    }


}