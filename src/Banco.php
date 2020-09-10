<?php
require_once "src/Conta.php";
require_once "src/Titular.php";

$titular = new Titular("Andrey", "03671316506");
$primeiraConta = new Conta($titular);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo var_dump($primeiraConta);

echo Conta::recuperaNumeroContas();

