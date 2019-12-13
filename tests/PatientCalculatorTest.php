<?php

namespace DevCapu\NutriLive\Tests;

use DevCapu\NutriLive\App\PatientCalculator;
use PHPUnit\Framework\TestCase;

class PatientCalculatorTest extends TestCase
{
    /**
     * @dataProvider generateWeightAndHeight
     * @param float $weight
     * @param float $height
     */
    public function testShouldCalculateBMI(float $weight, float $height)
    {
        $bmi = PatientCalculator::calculateBMI($weight, $height, false);
        self::assertEqualsWithDelta(24.618103775, $bmi, 0.05);
    }

    public function generateWeightAndHeight()
    {
        return [
            'Positive-weight-and-height' => [78, 1.78],
        ];
    }
}