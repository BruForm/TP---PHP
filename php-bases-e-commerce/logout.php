<?php
session_start();

$page = 'logout';
$pageTitle = "Déonnexion";
$customCssLinks = ['<link rel="stylesheet" href="/assets/login.css">'];

$_SESSION['user'] = "";
session_destroy();
header('location: ./index.php');

exit();