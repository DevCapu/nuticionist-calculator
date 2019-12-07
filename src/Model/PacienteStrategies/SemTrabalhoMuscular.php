<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class SemTrabalhoMuscular extends Atividade
{

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho)
    {
        return $gastoEnergeticoBasal + 500;
    }
}
