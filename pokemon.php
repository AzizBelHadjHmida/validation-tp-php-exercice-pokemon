<?php
 class Pokemon
 {
 
     public function __construct(public string $name, private string $url, private int $hp,private AttackPokemon $attackPokemon)
     {}
     public function getName(): string{
         return $this->name;
}
     public function getUrl(): string{
         return $this->url;
     }
     public function getHp(): int{
         return $this->hp;
     }
     public function getAttackPokemon(): AttackPokemon{
         return $this->attackPokemon;
     }
     public function setName(string $name): void{
         $this->name = $name;
     }
     public function setUrl(string $url): void{
         $this->url = $url;
     }
     public function setHp(int $hp): void{
         $this->hp = $hp;
     }
     public function setAttackPokemon(AttackPokemon $attackPokemon): void{
         $this->attackPokemon = $attackPokemon;
     }
     public function isDead(): bool{
         if ($this->hp <= 0) {
             return true;
         } else {
             return false;
         }
     }
     public function whoAmI(): void
     {
         echo "<div style='border:1px solid #ccc; border-radius:8px; padding:15px; margin:10px; width:260px; text-align:center; font-family:Arial'>";
         echo "<h3 style='margin:0'>" . $this->name . "</h3>";
         echo "<img src='" . $this->url . "' alt='image' width='120' style='margin:10px 0'><br>";
         echo "<strong>Points:</strong> " . $this->hp . "<br>";
         echo "<strong>Min Attack Points:</strong> " . $this->attackPokemon->getAttackMinimal() . "<br>";
         echo "<strong>Max Attack Points:</strong> " . $this->attackPokemon->getAttackMaximal() . "<br>";
         echo "<strong>Special Attack:</strong> " . $this->attackPokemon->getSpecialAttack() . "<br>";
         echo "<strong>Probability Special Attack:</strong> " . $this->attackPokemon->getProbabilitySpecialAttack() . "%";
         echo "</div>";
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