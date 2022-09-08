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

}