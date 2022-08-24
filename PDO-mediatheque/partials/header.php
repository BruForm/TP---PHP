<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= $pageTitle ?></title>

    <link rel="stylesheet" href="../style.css">

    <?php
        if(isset($customCssLinks) && !empty($customCssLinks)) {
            foreach($customCssLinks as $customCssLink) {
                echo $customCssLink;
            }
        }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
showMessage();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            