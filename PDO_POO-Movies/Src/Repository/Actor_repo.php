<?php

namespace App\Repository;

use App\Entity\Actor;

use \PDO;

class Actor_repo
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBmanager::connectDB();
    }

    public function findActors(): array
    {
        return DBmanager::findAll($this->db, "actor", Actor::class);
    }

    public function findMovieActors(int $movieId): array|bool
    {
        $sql = "
            SELECT ac.* FROM actor ac, movie_actor ma
            WHERE 1 = 1
            AND ma.movie_id = :movieId
            AND ma.actor_id = ac.id 
            ";

        try {
            $query = $this->db->prepare($sql);
            $query->bindParam(':movieId', $movieId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS, Actor::class);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }
}