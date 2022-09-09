<?php

namespace App\Repository;

use App\Entity\Movie;

use \PDO;

class Movie_repo
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBmanager::connectDB();
    }

    public function findMovies(): array
    {
        return DBmanager::findAll($this->db, "movie", Movie::class);
    }

    public function findMovie(int $id): array|bool
    {
        return DBmanager::findFromId($this->db, "movie", $id, Movie::class);
    }

    public function findMovieJoin(int $id): array|bool
    {
        $sql = "
            SELECT mo.*, di.directorName, co.compositorName FROM movie mo, director di, compositor co
            WHERE 1 = 1
            AND mo.id = :id
            AND di.id = mo.director_id 
            AND co.id = mo.compositor_id
            ";

        try {
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS, Movie::class);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }

}