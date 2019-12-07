<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class Saudavel extends Objetivo
{

    public function calculaVet($gastoEnergeticoTotal)
    {
        return $gastoEnergeticoTotal + 100;
    }
}
