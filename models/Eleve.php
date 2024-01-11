<?php

class Eleve extends Model
{
    protected string $prenom;
    protected int $ecoleId;

    public function getPrenom(): string
    {
        return ucfirst($this->prenom);
    }

    public function setPrenom(string $prenom): Eleve
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEcoleId(): int
    {
        return $this->ecoleId;
    }

    public function setEcoleId(int $ecoleId): Eleve
    {
        $this->ecoleId = $ecoleId;
        return $this;
    }

    public function getElevesWithSportsByEcoleId(int $ecoleId): array
    {
        $query = Database::getInstance()->prepare('
        SELECT e.nom AS eleve_nom, e.prenom AS eleve_prenom, GROUP_CONCAT(s.nom) AS sports
        FROM ' . $this->table . ' e
        LEFT JOIN eleve_sport es ON e.id = es.eleve_id
        LEFT JOIN sport s ON es.sport_id = s.id
        WHERE e.ecole_id = :ecole_id
        GROUP BY e.id
    ');
        $query->execute([
            'ecole_id' => $ecoleId
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countElevesbyEcoleId(int $ecoleId): int
    {
        $query = Database::getInstance()->prepare('SELECT COUNT(*) FROM ' . $this->table . ' WHERE ecole_id = :ecole_id');
        $query->execute([
            'ecole_id' => $ecoleId
        ]);

        return $query->fetchColumn();
    }

    public function countElevesBySportId(int $ecoleId): int
    {
        $query = Database::getInstance()->prepare('SELECT COUNT(DISTINCT e.id) FROM ' . $this->table . ' e INNER JOIN eleve_sport es ON e.id = es.eleve_id WHERE e.ecole_id = :ecole_id');
        $query->execute([
            'ecole_id' => $ecoleId
        ]);

        return $query->fetchColumn();
    }

    public function getElevesWithAllInformations(): false|array
    {
        $query = Database::getInstance()->prepare('
        SELECT e.id, e.nom, e.prenom, ec.nom AS nom_ecole, GROUP_CONCAT(s.nom) AS sports
        FROM ' . $this->table . ' e
        LEFT JOIN eleve_sport es ON e.id = es.eleve_id
        LEFT JOIN sport s ON es.sport_id = s.id
        LEFT JOIN ecole ec ON e.ecole_id = ec.id
        GROUP BY e.id
        ORDER BY e.nom ASC
    ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}