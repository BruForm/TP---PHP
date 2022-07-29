<?php
if (!isset($_SESSION['connexion'])) {
    $_SESSION['connexion'] = [
        'name' => '',
        'email' => '',
        'password' => '',
        'error' => [],
        'connexionOK' => false,
        'adminOK' => false,
    ];
};

function initSession()
{
    $_SESSION['connexion'] = [];
    $_SESSION['connexion']['connexionOK'] = false;
    $_SESSION['connexion']['adminOK'] = false;
}
