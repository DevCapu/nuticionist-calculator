<?php

namespace DevCapu\NutriLive\Model\PatientStrategies;

class LittleActive implements ActivityFactor
{
    private $activityFactor = 1.5;

    public function calculateTotalEnergyExpenditure(float $basalEnergyExependiture): float
    {
        return $basalEnergyExependiture * $this->activityFactor;
    }
}
