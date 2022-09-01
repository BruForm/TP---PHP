<?php
require_once "createDB.php";
session_start();

if (!isset($_SESSION['data']) || $_SESSION['data'] === [] || $_SESSION['data'] === "") {
    $_SESSION['data'] = createDB();
}

