<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

class Sedentary implements ActivityFactor
{
    private $activityFactor = 1.2;

    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float
    {
        return $basalEnergyExependiture * $this->activityFactor;
    }
}
