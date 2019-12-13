<?php

namespace DevCapu\NutriLive\App\Model\PatientStrategies;

interface Objective
{
    public function calculateCaloriesToBeIngestedToCommitObjective(float $totalEnergyExpenditure): float;
}
