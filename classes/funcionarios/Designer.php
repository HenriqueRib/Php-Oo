<?php

namespace classes\funcionarios;

use classes\abstratas\Funcionario;

class Designer extends Funcionario
{

    // Se esse codigo estiver ativo ele utilizará do polimorfismo para sobrescrever o metodo e assim ativa esse metodo.
    // OBS: ESSE CODIGO DARA UM FATAL ERRO PORQUE A CLASSE FUNCIONARIO ESTA COMO O METODO FINAL . CASO NAO ESTEJA ESSE
    // METODO FINAL ELE REALIZARA O POLIMORFISMO E SOBRESCREVERA O METODO aumentarSalario DA CLASS Funcionario


//    public function aumentaSalario()
//    {
//        return $this->salario *= 10.3;
//    }
    public function getBonificacao()
    {
        return $this->salario * 0.3;
    }
}