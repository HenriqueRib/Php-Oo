<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "autoload.php";

//use Validacao;
//use ContaCorrente;

//require "Validacao.php";
//require "ContaCorrente.php";


$contaJoao = new ContaCorrente('João da silva',"5199","163212",700.00);
$contaHenrique = new ContaCorrente('Henrique Ribeiro Moreira',"5199","163215",4700.00);
$contaMaria = new ContaCorrente('Maria de boa',"4099","151554",980.00);
$contaFernando = new ContaCorrente('Fernando de boa',"14099","51515",980.00);
$contaLucas = new ContaCorrente('Lucas de boa',"42099","15154",980.00);
$contaGabriel = new ContaCorrente('Gabriel de boa',"34099","31515",980.00);
$contaLuan = new ContaCorrente('Luan de boa',"40994","12515",980.00);


echo '<hr>';
echo '<pre>';
echo "Total de contas: " . ContaCorrente::$totalDeContas;
echo '<br>';
echo "Taxa: " . ContaCorrente::$taxaOperacao;
echo '</pre>';


echo '<hr>';





echo '<pre>';
var_dump($contaJoao);
echo '<br>';
var_dump($contaHenrique);
echo '</pre>';
echo '<hr>';

echo "<h2>Conta Corrente: Titular: " . $contaHenrique->getTitular()."</h2>";

echo '<pre>';
//
//try{
//    $contaGabriel['teste'];
//}catch (\Error $error){
//    echo "<b>" . $error->getMessage() . "</b> top <br>";
//}
var_dump($contaHenrique);
try{
    $contaHenrique->transferir(5000,$contaGabriel);


}catch (\InvalidArgumentException $error)
{
    echo "InvalidArgumentException" . "<br>";
    echo $error->getMessage();


}catch (\exception\SaldoInsuficienteException $error)
{
    $contaHenrique->totalSaquesNaoPermitidos ++;
//    echo "Capturando Exception de saldoInvalidException". "<br>";
    echo $error->getMessage() . " <b>Saldo em conta: " . $error->saldo . " Valor do saque: " . $error->valor . "</b>";


}catch (\Exception $error)
{

//    echo "Exception". "<br>";
//    var_dump($error->getPrevious());
    echo $error->getPrevious()->getMessage();
//    echo $error->getMessage();


}

echo "<b>Operações não realizadas : " . ContaCorrente::$operacaoNaoRealizada . "</b>";
echo '<br>';
var_dump($contaHenrique);
echo '</pre>';



echo '<hr>';

echo '<hr>';
