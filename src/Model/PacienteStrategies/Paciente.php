<?php

namespace DevCapu\NutriLive\Model\PacienteStrategies;

class Paciente extends Pessoa
{
    private $peso;
    private $altura;
    private $imc;
    private $pesoIdeal;
    private $atividade;
    private $objetivo;
    private $valorEnergeticoTotal;
    private $gastoEnergeticoTotal;
    private $gastoEnergeticoEmRepouso;

    public function __construct($dadosDaPessoa)
    {
        //parent::__construct($dadosDaPessoa);
        $this->peso = $dadosDaPessoa->peso;
        $this->altura = $this->formataAltura($dadosDaPessoa->altura);
        $this->imc = CalculadoraPaciente::calculaImc($this->altura, $this->peso);
        $this->pesoIdeal = $this->imc * $this->altura * $this->altura;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    /**
     * @param $atributo
     * @param $valor
     */
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    /**
     * @param  String $altura
     * @return float
     */
    private function formataAltura(string $altura): float
    {
        $alturaFormatada = substr($altura, 0, 1) . '.' . substr($altura, -2);
        return floatval($alturaFormatada);
    }
}
