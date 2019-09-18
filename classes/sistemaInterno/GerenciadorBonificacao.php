<?php
namespace classes\sistemaInterno;

use classes\abstratas\Funcionario;
use classes\abstratas\FuncionarioAutenticavel;
use classes\interfaces\Autenticavel;

class GerenciadorBonificacao implements Autenticavel
{
    private $totalBonificacoes;
    private $autentificado;

    public function registrar(Funcionario $funcionario){

        if($this->autentificado){
            $this->totalBonificacoes += $funcionario->getBonificacao();
        }else{
                    throw new \Exception("Voce não está logado");
                }

    }

    public function getTotalBonificacoes(){
        return $this->totalBonificacoes;

    }
    public function AutentiqueAqui(FuncionarioAutenticavel $funcionario, $senha)
    {
            if($funcionario->senha == $senha){
                $this->autentificado = true;
            }
    }
}