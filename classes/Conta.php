<?php

require_once __DIR__ . '/InstituicaoFinanceira.php';

// Abstração
abstract class Conta implements InstituicaoFinanceira {
    protected $saldo;
    protected $limiteDeCredito;

    public function __construct($saldo, $limiteDeCredito) {
        $this->saldo = $saldo;
        $this->limiteDeCredito = $limiteDeCredito;
    }

    // Encapsulamento
    public function getSaldo() {
        return "Saldo Atualizado: " . $this->saldo;
    }

    public function getLimiteDeCredito() {
        return $this->limiteDeCredito;
    }

    public function depositar($quantia) {
        $this->saldo += $quantia;
        return "Depósito efetuado de {$quantia}";
    }

    // Polimorfismo
    public function sacar($quantia) {
        if ($quantia <= $this->saldo) {
            $this->saldo -= $quantia;
            return "Saque efetuado de {$quantia}";
        } elseif ($quantia <= $this->saldo + $this->limiteDeCredito) {
            $this->saldo -= $quantia;
            return "Saque efetuado de {$quantia}";
        } else {
            return "Saldo insuficiente";
        }
    }
}
