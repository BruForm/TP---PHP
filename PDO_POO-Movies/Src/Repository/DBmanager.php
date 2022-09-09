<?php

namespace App\Repository;

use \PDO;

//$server = "localhost";
//$user = "root";
//$password = "";
//$dbname = "movies";

abstract class DBmanager
{
    // CONNECT DB
    public static function connectDB($server = "localhost", $user = "root", $password = "", $dbname = "movies"): PDO
    {
        try {
            $db = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function findAll(PDO $pdo, string $table, mixed $objClass): array
    {
        $sql = "
            SELECT * FROM $table
            WHERE 1 = 1
            ";

        try {
            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, $objClass);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }

    public static function findFromId(PDO $pdo, string $table, int $id, mixed $objClass): array|bool
    {
        $sql = "
            SELECT * FROM $table
            WHERE 1 = 1
            AND id = :id
            ";

        try {
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS, $objClass);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }
}
