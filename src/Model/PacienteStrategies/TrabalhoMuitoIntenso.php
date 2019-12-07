<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class TrabalhoMuitoIntenso extends Atividade
{

    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho)
    {
        return $gastoEnergeticoBasal + (100 * $horasDeTrabalho);
    }
}
