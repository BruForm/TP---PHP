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

}