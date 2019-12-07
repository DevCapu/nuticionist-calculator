<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class EmRepouso extends Atividade
{

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho)
    {
        return $gastoEnergeticoBasal + 300;
    }
}
