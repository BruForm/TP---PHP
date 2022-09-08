<?php

namespace App\Repository;

use App\Entity\Compositor;

use \PDO;

class Compositor_repo
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBmanager::connectDB();
    }

    public function findCompositors(): array
    {
        return DBmanager::findAll($this->db, "compositor", Compositor::class);
    }
    
}