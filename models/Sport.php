<?php

class Sport extends Model
{
    public function countSportsByEcoleId(int $ecoleId): int
    {
        $query = Database::getInstance()->prepare('SELECT COUNT(DISTINCT es.sport_id) FROM eleve e 
        INNER JOIN eleve_sport es ON e.id = es.eleve_id WHERE e.ecole_id = :ecole_id');
        $query->execute([
            'ecole_id' => $ecoleId
        ]);

        return $query->fetchColumn();
    }

    public function getSportsByEcoleIdWithEleves(int $ecoleId): array
    {
        $query = Database::getInstance()->prepare('
        SELECT s.nom AS sport_nom, COUNT(*) AS nombre_eleves, GROUP_CONCAT(e.prenom) AS eleves
        FROM ' . $this->table . ' s
        INNER JOIN eleve_sport es ON s.id = es.sport_id
        INNER JOIN eleve e ON es.eleve_id = e.id
        WHERE e.ecole_id = :ecole_id
        GROUP BY s.id
        ORDER BY nombre_eleves ASC
    ');
        $query->execute([
            'ecole_id' => $ecoleId
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSportsWithEleves(): array
    {
        $query = Database::getInstance()->prepare('
        SELECT s.nom AS sport_nom, COUNT(*) AS nombre_eleves, GROUP_CONCAT(e.prenom, " ", e.nom) AS eleves
        FROM ' . $this->table . ' s
        INNER JOIN eleve_sport es ON s.id = es.sport_id
        INNER JOIN eleve e ON es.eleve_id = e.id
        GROUP BY s.id
        ORDER BY nombre_eleves ASC
    ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}