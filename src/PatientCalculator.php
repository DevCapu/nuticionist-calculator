<?php

namespace DevCapu\NutriLive;

use DevCapu\NutriLive\Model\PatientStrategies\Active;
use DevCapu\NutriLive\Model\PatientStrategies\ActivityFactor;
use DevCapu\NutriLive\Model\PatientStrategies\Define;
use DevCapu\NutriLive\Model\PatientStrategies\Gain;
use DevCapu\NutriLive\Model\PatientStrategies\LittleActive;
use DevCapu\NutriLive\Model\PatientStrategies\Lose;
use DevCapu\NutriLive\Model\PatientStrategies\Objective;
use DevCapu\NutriLive\Model\PatientStrategies\Sedentary;
use DevCapu\NutriLive\Model\PatientStrategies\VeryActive;

class PatientCalculator
{
    public static function calculateBMI(float $weight, float $height, bool $rounded = true): float
    {
        $imc = $weight / pow($height, 2);
        return $rounded ? round($imc, 2) : $imc;
    }

    public static function calculateAge(string $birthday): int
    {
        try {
            $date = new \DateTime($birthday);
            $interval = $date->diff(new DateTime(date('Y - m - d')));
            return $interval->format(' % Y');
        } catch (\Exception $exception) {
            print_r($exception->getMessage());
        }
    }

    public static function calculateBasalEnergyExpenditure(string $gender, float $weight, float $height, string $birthday): float
    {
        $age = PatientCalculator::calculateAge($birthday);
        if ($gender === "male") {
            $basalEnergyExpenditure = 66.5 + (13.8 * $weight) + (5.0 * $height) - (6.8 * $age);
        } elseif ($gender === "female") {
            $basalEnergyExpenditure = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
        } else {
            throw new \InvalidArgumentException('$birthday argument must be: \'male\' or \'female\'');
        }
        return $basalEnergyExpenditure;
    }

    public static function calculateTotalEnergyExpenditure(float $basalEnergyExpenditure, string $activityCoefficients): float
    {
        $listActivityCoefficients = [
            'sedentary' => Sedentary::class,
            'littleActive' => LittleActive::class,
            'active' => Active::class,
            'veryActive' => VeryActive::class,
        ];

        $namespace = $listActivityCoefficients[$activityCoefficients];
        /** @var ActivityFactor $class */
        $class = new $namespace();
        return $class->calculateTotalEnergyExpenditure($basalEnergyExpenditure);
    }

    public static function calculateCaloriesToBeIngestedToCommitObjective(float $totalEnergyExpenditure, string $objective): float
    {
        $listObjectives = [
            'lose' => Lose::class,
            'gain' => Gain::class,
            'define' => Define::class
        ];

        $namespace = $listObjectives[$objective];
        /** @var Objective $class */
        $class = new $namespace();
        return $class->calculateCaloriesToBeIngestedToCommitObjective($totalEnergyExpenditure);
    }
}
