<?php

namespace DevCapu\NutriLive\Model\PatientStrategies;

class VeryActive implements ActivityFactor
{
    private $activityFactor = 2.1;

    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float
    {
        return $basalEnergyExependiture * $this->activityFactor;
    }
}
