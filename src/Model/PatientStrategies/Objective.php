<?php

namespace DevCapu\NutriLive\Model\PatientStrategies;

interface Objective
{
    public function calculateCaloriesToBeIngestedToCommitObjective(float $totalEnergyExpenditure): float;
}
