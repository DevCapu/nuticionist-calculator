<?php

namespace DevCapu\NutriLive\Model\PatientStrategies;

interface ActivityFactor
{
    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float;
}
