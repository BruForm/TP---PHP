<?php
// Models pour "user"

function listUsers(PDO $db): array
{
    $querySelect = "SELECT * FROM user ORDER BY name";

    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


