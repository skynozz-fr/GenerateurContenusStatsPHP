<?php

class Model
{
    protected string $table;
    protected string $nom;

    public function __construct()
    {
        $this->table = strtolower(get_class($this));
    }

    public function getAll(): array
    {
        $query = Database::getInstance()->prepare('SELECT * FROM ' . $this->table);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllIds(): array
    {
        $query = Database::getInstance()->prepare('SELECT id FROM ' . $this->table);
        $query->execute();

        return array_column($query->fetchAll(PDO::FETCH_ASSOC), 'id');
    }

    public function setNom(string $nom): Model
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom(): string
    {
        return ucfirst($this->nom);
    }
}