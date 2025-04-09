<?php
require_once "attackpokemon.php";
require_once "pokemon.php";
require_once "pokemonfeu.php";
require_once "pokemoneau.php";
require_once "pokemonplante.php";

class Combat
{
    private Pokemon $p1;
    private Pokemon $p2;

    public function __construct(Pokemon $p1, Pokemon $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    public function lancerCombat(): void
    {
        $round = 1;
        while (!$this->p1->isDead() && !$this->p2->isDead()) {
            echo "<div style='background-color:#ffeef2; margin:10px; padding:10px'>";
            echo "<h3>Round $round</h3>";
            echo "<div style='display:flex; justify-content: space-around'>";
            $this->p1->whoAmI();
            $this->p2->whoAmI();
            echo "</div>";

            $this->p1->attack($this->p2);
            if (!$this->p2->isDead()) {
                $this->p2->attack($this->p1);
            }
            $round++;
            echo "</div>";
        }

        
        echo "<div style='background-color:#d4fcd4; padding:15px; text-align:center'>";
        echo "<h2>Le vainqueur est : " . ($this->p1->isDead() ? $this->p2->getName() : $this->p1->getName()) . "</h2>";
        echo "</div>";
    }
}



$pokemon1 = new PokemonFeu(
    "Dracaufeu Gigamax",
    "images/draceufeu.jpg",
    200,
    new AttackPokemon(10, 100, 2, 20)
);

$pokemon2 = new PokemonPlante(
    "Florizarre",
    "images/florizarre.jpg",
    200,
    new AttackPokemon(10, 100, 1, 20)
);

$combat = new Combat($pokemon1, $pokemon2);
$combat->lancerCombat();
