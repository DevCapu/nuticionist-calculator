<?php


namespace DevCapu\NutriLive\Interfaces;

interface CalculadoraTipoAtividade
{
    public function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $horasDeTrabalho);
}
