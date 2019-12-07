<?php

namespace DevCapu\NutriLive\Model\PacienteStrategies;

use Model\Model;
use stdClass;

class HealthInfo implements Model
{
    private $gender;
    private $weight;
    private $height;
    private $imc;
    private $activity;
    private $vet;
    private $objective;
    private $dateOfBirth;

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }


    public function __construct(\stdClass $data)
    {
        $this->populateModel($data);
        var_dump($this);
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * @param mixed $imc
     */
    public function setImc($imc): void
    {
        $this->imc = $imc;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity): void
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getVet()
    {
        return $this->vet;
    }

    /**
     * @param mixed $vet
     */
    public function setVet($vet): void
    {
        $this->vet = $vet;
    }

    /**
     * @return mixed
     */
    public function getObjective()
    {
        return $this->objective;
    }

    /**
     * @param mixed $objective
     */
    public function setObjective($objective): void
    {
        $this->objective = $objective;
    }

    public function populateModel(stdClass $class)
    {
        $objectVars = get_object_vars($class);
        if (!is_null($objectVars) && !empty($objectVars)) {
            foreach ($objectVars as $atribute => $value) {
                $this->$atribute = $value;
            }
        }

        $this->imc = $this->calculaImc();

        $this->vet = CalculadoraPaciente::calculaVet($this->objective, $this->gender, $this->weight, $this->height, $this->calculaIdade(), $this->activity);
    }

    private function calculaImc(): float
    {
        $imc = $this->weight / (pow($this->height, 2));
        return $imc;
    }

    private function calculaIdade()
    {

        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = array_reverse(explode('-', $this->dateOfBirth));

        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
    }
}
