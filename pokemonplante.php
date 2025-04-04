<?php
class PokemonPlante extends Pokemon
{
    public function attack(pokemon $p): void
    {
        $randomProbability = mt_rand(0, 100);
        if ($randomProbability <= $this->getAttackPokemon()->getProbabilitySpecialAttack()) {
            $attackPoint = mt_rand($this->getAttackPokemon()->getAttackMinimal(), $this->getAttackPokemon()->getAttackMaximal());
            $damage = $this->getAttackPokemon()->getSpecialAttack() * $attackPoint;
        } else {
            $damage = mt_rand($this->getAttackPokemon()->getAttackMinimal(), $this->getAttackPokemon()->getAttackMaximal());
        }
        switch ($this->whichInstance($p)) {
            case "PokemonEau":
                $damage *= 2;
                break;
            case "PokemonFeu":
                $damage *= 0.5;
                break;
        }
        $p->setHp($p->getHp() - $damage);
    }
}
