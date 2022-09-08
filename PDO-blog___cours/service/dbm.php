<?php
require_once "./vendor/autoload.php";
use App;

//$server = "localhost";
//$user = "root";
//$password = "";
//$dbname = "pdo_blog";


// CONNECT DB
function connectDB($server = "localhost", $user = "root", $password = "", $dbname = "pdo_blog"): PDO
{
    try {
        $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
