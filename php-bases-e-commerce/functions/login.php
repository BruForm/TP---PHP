<?php

function checkUserLogin(string $email, string $password): array
{
    require_once './data/users.php';

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            if (password_verify($password, $user['password'])) {
                // $_SESSION['user'] = $user;
                // header('location: ./index.php');
                return ['loginOK' => true, 'userLoged' => $user];
            }
        }
    }
    return ['loginOK' => false, 'userLoged' => ""];
}
