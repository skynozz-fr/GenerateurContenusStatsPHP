<?php

class EleveFixtures extends Fixture
{
    public function generate(int $number = 10): void
    {
        $ecoles = (new Ecole)->getAllIds();
        $sports = (new Sport)->getAllIds();

        for ($i = 0; $i < $number; $i++) {
            $eleve = new Eleve();
            $eleve
                ->setNom(self::randomString(5))
                ->setPrenom(self::randomString(5))
                ->setEcoleId($ecoles[rand(0, 2)]);

            Database::getInstance()
                ->prepare('INSERT INTO eleve (nom, prenom, ecole_id) VALUES (:nom, :prenom, :ecole_id)')
                ->execute([
                    'nom' => $eleve->getNom(),
                    'prenom' => $eleve->getPrenom(),
                    'ecole_id' => $eleve->getEcoleId()
                ]);

            $eleveId = Database::getInstance()->lastInsertId();

            $numberOfSports = rand(SPORTS_MIN, SPORTS_MAX);

            $assignedSports = [];

            for ($j = 0; $j < $numberOfSports; $j++) {
                do {
                    $sportId = $sports[rand(0, count($sports) - 1)];
                } while (in_array($sportId, $assignedSports));

                $assignedSports[] = $sportId;

                Database::getInstance()
                    ->prepare('INSERT INTO eleve_sport (eleve_id, sport_id) VALUES (:eleve_id, :sport_id)')
                    ->execute([
                        'eleve_id' => $eleveId,
                        'sport_id' => $sportId
                    ]);
            }
        }
    }
}
