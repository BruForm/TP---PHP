<?php
// Models pour "media"

function listMedias(PDO $db, int $currentPage, int $parPage): array
{
    $querySelect = "SELECT * FROM media ORDER BY title";

    $query = $db->prepare($querySelect);
    // $sth->bindValue(':premier', $premier, PDO::PARAM_INT);
    // $sth->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function listMediasTypeName(PDO $db, int $currentPage, int $parPage): array
{
    $querySelect = "
    SELECT m.*, t.name
    FROM media m, type t
    WHERE 1=1
    AND t.id = m.type_id
    ORDER BY title";

    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}