<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

class VeryActive implements ActivityFactor
{
    private $activityFactor = 2.1;

    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float
    {
        return $basalEnergyExependiture * $this->activityFactor;
    }
}
