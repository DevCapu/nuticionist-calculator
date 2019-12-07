<?php


namespace DevCapu\NutriLive\Model\PacienteStrategies;

class TrabalhoLeve extends Atividade
{
    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDetrabalho)
    {
        return $gastoEnergeticoBasal + (100 * $horasDetrabalho);
    }
}
