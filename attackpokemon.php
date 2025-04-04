<?php
class AttackPokemon
{
    public function __construct(private int $attackMinimal, private int $specialAttack, private float $probabilitySpecialAttack, private int $attackMaximal)
    {
    }

    public function getAttackMinimal()
    {
        return $this->attackMinimal;
    }
    public function getAttackMaximal()
    {
        return $this->attackMaximal;
    }
    public function getSpecialAttack()
    {
        return $this->specialAttack;
    }
    public function getProbabilitySpecialAttack()
    {
        return $this->probabilitySpecialAttack;
    }
    public function setAttackMinimal(int $attackMinimal)
    {
        $this->attackMinimal = $attackMinimal;
    }
    public function setAttackMaximal(int $attackMaximal)
    {
        $this->attackMaximal = $attackMaximal;
    }
    public function setSpecialAttack(int $specialAttack)
    {
        $this->specialAttack = $specialAttack;
    }
    public function setProbabilitySpecialAttack(int $probabilitySpecialAttack)
    {
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
}
