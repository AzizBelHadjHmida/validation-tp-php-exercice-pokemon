<?php
class Pokemon
{

    public function __construct(public string $name, private string $url, private int $hp, private AttackPokemon $attackPokemon): void
    {
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
    public function getHp(): int
    {
        return $this->hp;
    }
    public function getAttackPokemon(): AttackPokemon
    {
        return $this->attackPokemon;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }
    public function setAttackPokemon(AttackPokemon $attackPokemon): void
    {
        $this->attackPokemon = $attackPokemon;
    }
    public function isDead(): bool
    {
        if ($this->hp <= 0) {
            return true;
        } else {
            return false;
        }
    }
    public function whoAmI(): void
    {
        echo "name:" . $this->name;
        echo "points:" . $this->hp;
        echo "Min Attack Points:" . $this->attackPokemon->getAttackMinimal();
        echo "Max Attack Points:" . $this->attackPokemon->getAttackMaximal();
        echo "special attack:" . $this->attackPokemon->getSpecialAttack();
        echo "probability special attack:" . $this->attackPokemon->getProbabilitySpecialAttack();
    }
    public function attack(Pokemon $p): void
    {
        $randomProbability = mt_rand(0, 100);
        if ($randomProbability <= $this->attackPokemon->getProbabilitySpecialAttack()) {
            $attackPoint = mt_rand($this->attackPokemon->getAttackMinimal(), $this->attackPokemon->getAttackMaximal());
            $damage = $this->attackPokemon->getSpecialAttack() * $attackPoint;
            $p->setHp($p->getHp() - $damage);
        } else {
            $attackPoint = mt_rand($this->attackPokemon->getAttackMinimal(), $this->attackPokemon->getAttackMaximal());
            $p->setHp($p->getHp() - $attackPoint);
        }
    }
    /**
     * will be used in the children classes
     * @return string the type of pokemon:Feu,Eau,Plante,Normal
     */
    public function whichInstance(pokemon $p): string
    {
        if ($p instanceof PokemonFeu) {
            return "PokemonFeu";
        } elseif ($p instanceof PokemonEau) {
            return "PokemonEau";
        } elseif ($p instanceof PokemonPlante) {
            return "PokemonPlante";
        } else {
            return "Pokemon";
        }
    }
}
