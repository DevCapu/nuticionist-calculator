<?php

namespace DevCapu\NutriLive\Model\PacienteStrategies;

abstract class Pessoa
{
    protected $nome;
    protected $usuario;
    protected $email;
    protected $dataNascimento;
    protected $sexoBiologico;


    public function __construct($dadosDaPessoa)
    {
        $this->nome = $dadosDaPessoa->nome;
        $this->usuario = $dadosDaPessoa->usuario;
        $this->email = $dadosDaPessoa->email;
        $this->dataNascimento = $dadosDaPessoa->dataNascimento;
        $this->sexoBiologico = $dadosDaPessoa->sexoBiologico;
    }
}
