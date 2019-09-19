<?php

require "ContaCorrente.php";

$contaJoao = new ContaCorrente('João da silva',"5199","163212",700.00);
$contaHenrique = new ContaCorrente('Henrique Ribeiro Moreira',"5199","163215",4700.00);



echo '<pre>';
var_dump($contaJoao);
echo '<br>';
var_dump($contaHenrique);
echo '</pre>';
