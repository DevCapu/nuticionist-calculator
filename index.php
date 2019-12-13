<?php

use DevCapu\NutriLive\PatientCalculator;

require_once __DIR__ . '/vendor/autoload.php';

echo PatientCalculator::calculateAge("2000-10-15");
