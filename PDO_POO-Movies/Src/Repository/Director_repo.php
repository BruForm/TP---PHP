<?php

namespace App\Repository;

use App\Entity\Director;

use \PDO;

class Director_repo
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBmanager::connectDB();
    }

    public function findDirectors(): array
    {
        return DBmanager::findAll($this->db, "director", Director::class);
    }

}