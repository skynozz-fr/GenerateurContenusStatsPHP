<?php

class SportFixtures extends Fixture
{
    private array $sports = SPORTS_LIST;

    public function generate(int $number = 10): void
    {
         for ($i = 0; $i < $number; $i++) {
            $sport = new Sport();
            $sport->setNom($this->sports[$i]);
            Database::getInstance()
                ->prepare('INSERT INTO sport (nom) VALUES (:nom)')
                ->execute([
                    'nom' => $sport->getNom()
                ]);
        }
    }
}