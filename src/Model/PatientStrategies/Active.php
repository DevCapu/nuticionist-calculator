<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

class Active implements ActivityFactor
{
    private $activityFactor = 1.8;

    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float
    {
        return $basalEnergyExependiture * $this->activityFactor;
    }
}
