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
        if ($weight <= 0 || $height <= 0) {
            self::expectException(\InvalidArgumentException::class);
            $bmi = PatientCalculator::calculateBMI($weight, $height, false);
        } else {
            $bmi = PatientCalculator::calculateBMI($weight, $height, false);
            self::assertEqualsWithDelta(24.618103775, $bmi, 0.05);
        }
    }

    public function generateWeightAndHeight()
    {
        return [
            'Positive-weight-and-height' => [78, 1.78],
            'Negative-weight-and-height' => [-78, 1.78],
            'Positive-weight-and-positive-height' => [78, -1.78],
        ];
    }
}
