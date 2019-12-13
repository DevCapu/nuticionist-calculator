<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

interface ActivityFactor
{
    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float;
}
