<?php

namespace DevCapu\NutriLive;

use DateTime;
use DevCapu\NutriLive\Model\PacienteStrategies\Atividade;
use Exception;

class CalculadoraPaciente
{
    private const ACTIVITIES_NAMESPACE = 'DevCapu\\NutriLive\\Model\\PacienteStrategies\\';

    public static function calculaImc($peso, $altura): float
    {
        return $peso / pow($altura, 2);
    }

    public static function calculaGastoEnergeticoBasal(
        $sexoBiologico,
        $pesoPaciente,
        $alturaPaciente,
        $idadePaciente
    ): float {
        if ($sexoBiologico === "MASCULINO") {
            $gastoEnergeticoBasal = 66.5 + (13.8 * $pesoPaciente) + (5.0 * $alturaPaciente) - (6.8 * $idadePaciente);
            return $gastoEnergeticoBasal;
        }
        $gastoEnergeticoBasal = 655 + (9.6 * $pesoPaciente) + (1.8 * $alturaPaciente) - (4.7 * $idadePaciente);
        return $gastoEnergeticoBasal;
    }

    public static function calculaGastoEnergeticoTotal($gastoEnergeticoBasal, $atividade): float
    {
        $nivelAtividade = [
            'EmRepouso' => 'EmRepouso',
            'SemTrabalhoMuscular' => 'SemTrabalhoMuscular',
            'TrabalhoLeve' => 'TrabalhoLeve',
            'TrabalhoModerado' => 'TrabalhoModerado',
            'TrabalhoIntenso' => 'TrabalhoIntenso',
            'TrabalhoMuitoIntenso' => 'TrabalhoMuitoIntenso'
        ];

        $namespace = self::ACTIVITIES_NAMESPACE . $nivelAtividade[$atividade];
        /**
         * @var $classe Atividade
         *
         **/
        echo $namespace;
        $classe = new $namespace();
        return $classe->calculaGastoEnergeticoTotal($gastoEnergeticoBasal, 6);
    }

    public static function calculaIdade($dataDeNascimento): int
    {
        try {
            $date = new DateTime($dataDeNascimento);
            $interval = $date->diff(new DateTime(date('Y-m-d')));
            return $interval->format('%Y');
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
