<?php

namespace DevCapu\NutriLive\Model;

use DevCapu\NutriLive\Dto\PacienteCadastroDto;
use DevCapu\NutriLive\Dto\PacienteDto;

class Paciente
{
    public static $id = null;

    private $nome;
    private $usuario;
    private $email;
    private $senha;
    private $peso;
    private $altura;
    private $imc;
    private $coeficienteDeAtividade;
    private $dataDeNascimento;
    private $objetivo;
    private $valorEnergeticoBasal;
    private $valorEnergeticoTotal;
    private $sexoBiologico;

    public function __construct(PacienteDto $pacienteDto)
    {
        $this->nome = $pacienteDto->getNome();
        $this->usuario = $pacienteDto->getUsuario();
        $this->email = $pacienteDto->getEmail();
        $this->senha = $pacienteDto->getSenha();
        $this->peso = $pacienteDto->getPeso();
        $this->altura = $pacienteDto->getAltura();
        $this->imc = $pacienteDto->getImc();
        $this->coeficienteDeAtividade = $pacienteDto->getCoeficienteDeAtividade();
        $this->dataDeNascimento = $pacienteDto->getDataDeNascimento();
        $this->objetivo = $pacienteDto->getObjetivo();
        $this->valorEnergeticoBasal = $pacienteDto->getValorEnergeticoBasal();
        $this->valorEnergeticoTotal = $pacienteDto->getValorEnergeticoTotal();
        $this->sexoBiologico = $pacienteDto->getSexoBiologico();
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return mixed
     */
    public function getCoeficienteDeAtividade()
    {
        return $this->coeficienteDeAtividade;
    }

    /**
     * @return mixed
     */
    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }

    /**
     * @return mixed
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * @return mixed
     */
    public function getValorEnergeticoBasal()
    {
        return $this->valorEnergeticoBasal;
    }

    /**
     * @return mixed
     */
    public function getValorEnergeticoTotal()
    {
        return $this->valorEnergeticoTotal;
    }

    /**
     * @return mixed
     */
    public function getSexoBiologico()
    {
        return $this->sexoBiologico;
    }
}
