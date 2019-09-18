<?php

require_once "autoload.php";

use classes\funcionarios\Designer;
use classes\funcionarios\Diretor;
use classes\sistemaInterno\GerenciadorBonificacao;
//use classes\abstratas\Funcionario;
// teste para instanciar uma classe . Como ela esta abstract agora não dá.


$diretor = new Diretor("420.777.008.90" , 10000);
$diretor->senha = "123456";
$designer = new Designer("320.888.009.80",1000);

$gerenciador = new GerenciadorBonificacao();


echo "<pre>";
$gerenciador->AutentiqueAqui($diretor, "123456");
$gerenciador->registrar($diretor);

var_dump($gerenciador->getTotalBonificacoes());


//var_dump($diretor->autenticar("123456"));

var_dump($diretor);
var_dump($designer);

$designer->aumentaSalario();
$diretor->aumentaSalario();

var_dump($diretor);
var_dump($designer);
$gerenciador->registrar($designer);

var_dump($gerenciador->getTotalBonificacoes());

echo "</pre>";
?>
