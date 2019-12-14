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

    /**
     * @dataProvider generateBirthdays
     * @param string $birthday
     */
    public function testShouldCalculateAge(string $birthday)
    {
        if (strpos($birthday, "/") !== false) {
            $this->expectException(\InvalidArgumentException::class);
            PatientCalculator::calculateAge($birthday);
        } elseif ($birthday === '3000-12-31') {
            $age = PatientCalculator::calculateAge($birthday);
            self::assertEquals(981, $age);
        } else {
            $age = PatientCalculator::calculateAge($birthday);
            self::assertEquals(19, $age);
        }
    }

    /*DATA PROVIDERS*/
    public function generateWeightAndHeight(): array
    {
        return [
            'Positive-weight-and-height' => [78, 1.78],
            'Negative-weight-and-height' => [-78, 1.78],
            'Positive-weight-and-positive-height' => [78, -1.78],
        ];
    }

    public function generateBirthdays(): array
    {
        return [
            'Right-date' => ['2000-10-15'],
            'Wrong-format' => ['15/10/2000'],
            'Future-date' => ['3000-12-31'],
        ];
    }
}
