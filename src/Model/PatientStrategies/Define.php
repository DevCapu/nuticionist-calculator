<?php

namespace DevCapu\NutriLive\Model\PatientStrategies;

class Define
{
    private $PerCentNeedToCommitObjective = 1;

    public function calculateCaloriesToBeIngestedToCommitObjective(float $totalEnergyExpenditure): float
    {
        return $totalEnergyExpenditure * $this->PerCentNeedToCommitObjective;
    }
}
