<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class Emagrecer extends Objetivo
{

    public function calculaVet($gastoEnergeticoTotal)
    {
        return $gastoEnergeticoTotal - 300;
    }
}
