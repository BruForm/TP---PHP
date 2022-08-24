<?php
// Models pour "type"

function listTypes(PDO $db): array
{
    $querySelect = "SELECT * FROM type ORDER BY name";

    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function typeById(PDO $db, $id): array
{
    $querySelect = "SELECT * FROM type WHERE id = :id ORDER BY name";

    $query = $db->prepare($querySelect);
    
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

