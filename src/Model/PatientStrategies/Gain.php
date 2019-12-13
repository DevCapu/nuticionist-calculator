<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

class Gain implements Objective
{
    private $PerCentNeedToCommitObjective = 1.23;

    public function calculateCaloriesToBeIngestedToCommitObjective(float $totalEnergyExpenditure): float
    {
        return $totalEnergyExpenditure * $this->PerCentNeedToCommitObjective;
    }
}
