<?php

class Conta 
{
    private $titular;
    private $saldo;
    private static $numeroContas;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroContas++;
    }

    public function sacar($valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo Indisponivel";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function depositar($valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }
        
        $this->saldo += $valorADepositar;
    }

    public function transferir($valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function getTitular(): Titular
    {
        return $this->titular;
    }

    public static function recuperaNumeroContas(): int
    {
        return self::$numeroContas;
    }

    public function __destruct()
    {
        self::$numeroContas--;
    }
}