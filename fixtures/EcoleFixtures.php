<?php

class EcoleFixtures extends Fixture
{
    public function generate(int $number = 3): void
    {
        for ($i = 0; $i < $number; $i++) {
            $ecole = new Ecole();
            $ecole->setNom(self::randomString(10));
            Database::getInstance()
                ->prepare('INSERT INTO ecole (nom) VALUES (:nom)')
                ->execute([
                    'nom' => $ecole->getNom()
                ]);
        }
    }
}