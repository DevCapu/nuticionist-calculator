<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class Engordar extends Objetivo
{
    public function calculaVet($gastoEnergeticoTotal)
    {
        return $gastoEnergeticoTotal + 300;
    }
}
