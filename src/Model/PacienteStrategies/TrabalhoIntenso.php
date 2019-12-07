<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class TrabalhoIntenso extends Atividade
{
    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho)
    {
        return $gastoEnergeticoBasal + (300 * $horasDeTrabalho);
    }
}
