<?php
session_start();

include '../data/usersData.php';
include '../data/connexion.php';

$error = false;
$indUser = null;
initSession();

// echo "<pre>" . var_dump($_SESSION['connexion']) . "</pre>";

// if (isset($_SESSION['connexion'])) {
if (isset($_POST['submit'])) {
    
    $_SESSION['connexion']['error'] = [];

    if (htmlspecialchars($_POST['name']) === '') {
        array_push($_SESSION['connexion']['error'], "Le name doit être renseigné !");
        $error = true;
    }

    if (htmlspecialchars($_POST['email']) === '') {
        array_push($_SESSION['connexion']['error'], "L'e-mail doit être renseigné !");
        $error = true;
    }

    if (htmlspecialchars($_POST['password']) === '') {
        array_push($_SESSION['connexion']['error'], "Le password doit être renseigné !");
        $error = true;
    }

    if (!$error) {

        foreach ($users as $index => $user) {
            if ($user['email'] === htmlspecialchars($_POST['email'])) {
                $indUser = $index;
            }
        }
        if ($indUser === null) {
            array_push($_SESSION['connexion']['error'], "Vous n'êtes pas inscrit ! Creez un compte.");
            $error = true;
        } else {
            // echo '$indUser : ' . $indUser . "<br>";
            // echo "<pre>" . var_dump($_SESSION['connexion']) . "</pre><br>";
            // echo 'Name : ' . $users[$indUser]['name'];
            if (
                $users[$indUser]['name'] === htmlspecialchars($_POST['name'])
                && $users[$indUser]['email'] === htmlspecialchars($_POST['email'])
                && $users[$indUser]['password'] === htmlspecialchars($_POST['password'])
            ) {
                $_SESSION['connexion']['name'] = htmlspecialchars($_POST['name']);
                $_SESSION['connexion']['email'] = htmlspecialchars($_POST['email']);
                $_SESSION['connexion']['password'] = htmlspecialchars($_POST['password']);
                $_SESSION['connexion']['connexionOK'] = true;
                $_SESSION['connexion']['adminOK'] = $users[$indUser]['isAdmin'];
            } else {
                array_push($_SESSION['connexion']['error'], "Les données saisies sont inexactes.");
                $error = true;
            }
        }
    }
};

if ($error) {
    header('location: ../pages/connexion.php');
} else {
    header('location: ../index.php');
}
