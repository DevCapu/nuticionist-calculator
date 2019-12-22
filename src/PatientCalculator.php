<?php

namespace DevCapu\NutriLive\App;

use DevCapu\NutriLive\App\Model\PatientStrategies\Active;
use DevCapu\NutriLive\App\Model\PatientStrategies\ActivityFactor;
use DevCapu\NutriLive\App\Model\PatientStrategies\Define;
use DevCapu\NutriLive\App\Model\PatientStrategies\Gain;
use DevCapu\NutriLive\App\Model\PatientStrategies\LittleActive;
use DevCapu\NutriLive\App\Model\PatientStrategies\Lose;
use DevCapu\NutriLive\App\Model\PatientStrategies\Objective;
use DevCapu\NutriLive\App\Model\PatientStrategies\Sedentary;
use DevCapu\NutriLive\App\Model\PatientStrategies\VeryActive;

class PatientCalculator
{
    public static function calculateBMI(float $weight, float $height, bool $rounded = true): float
    {
        if ($weight <= 0 || $height < 0) {
            throw new \InvalidArgumentException("Weight or Height cannot be a negative number");
        }

        $imc = $weight / pow($height, 2);
        return $rounded ? round($imc, 2) : $imc;
    }

    public static function calculateAge(string $birthday): int
    {
        if (strpos($birthday, '/') !== false) {
            throw new \InvalidArgumentException("Birthday format should be: yyyy-MM-dd");
        }
        try {
            $date = new \DateTime($birthday);
            $interval = $date->diff(new \DateTime(date('Y-m-d')));
            return (int)$interval->format('%Y');
        } catch (\Exception $exception) {
            print_r($exception->getMessage());
        }
        return 0;
    }

    /**
     * @param string $gender
     * @param float $weight
     * @param float $height
     * @param string $birthday
     * @return float
     */
    public static function calculateBasalEnergyExpenditure(
        string $gender,
        float $weight,
        float $height,
        string $birthday
    ): float {

        if ($gender !== "male" && $gender !== "female") {
            throw new \InvalidArgumentException('$gender argument must be: \'male\' or \'female\'');
        } elseif ($weight <= 0) {
            throw new \InvalidArgumentException('$weight argument must be <= 0');
        } elseif ($height <= 0) {
            throw new \InvalidArgumentException('$height argument must be <= 0');
        }
        $age = PatientCalculator::calculateAge($birthday);
        if ($gender === "male") {
            $basalEnergyExpenditure = 66.5 + (13.8 * $weight) + (5.0 * $height) - (6.8 * $age);
        } elseif ($gender === "female") {
            $basalEnergyExpenditure = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
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
        /**
         * @var ActivityFactor $class
         */
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
        /**
         * @var Objective $class
         */
        $class = new $namespace();
        return $class->calculateCaloriesToBeIngestedToCommitObjective($totalEnergyExpenditure);
    }
}
