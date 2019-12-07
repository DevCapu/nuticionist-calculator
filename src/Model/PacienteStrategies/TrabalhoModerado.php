<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class TrabalhoModerado extends Atividade
{

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho)
    {
        return $gastoEnergeticoBasal + (200 * $horasDeTrabalho);
    }
}
