<?php

// Connexion to database
function connectDB(string $server, string $dbname, string $user, string $password): PDO
{
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

// SELECT query
function querySelect($db, $querySelect): array
{
    $query = $db->prepare($querySelect);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// INSERT Patients query
function queryInsertPatient($db, $lastname, $firstname, $birthdate, $phone, $email): ?int
{

    $queryInsert = "
        INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
        VALUES (:lastname, :firstname, :birthdate, :phone, :email)
        ";
    $query = $db->prepare($queryInsert);

    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':birthdate', $birthdate);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    $query->execute();

    return $query->rowCount();
}

// INSERT Appointments query
function queryInsertAppointments($db, $idPatient, $date, $hour): ?int
{
    // $dateHour = new DateTime();
    $dateHour = $date . ' ' . $hour . ':00';

    // $queryInsert = "
    //     INSERT INTO appointments (idPatients, dateHour)
    //     VALUES (
    //         (SELECT id FROM patients WHERE lastname = :lastname AND firstname = :firstname),
    //         :dateHour
    //        )
    //     ";
    $queryInsert = "
        INSERT INTO appointments (idPatients, dateHour)
        VALUES (
            :idPatient,
            :dateHour
           )
        ";
    $query = $db->prepare($queryInsert);

    // $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    // $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':idPatient', $idPatient, PDO::PARAM_INT);
    $query->bindParam(':dateHour', $dateHour, PDO::PARAM_STR);

    $query->execute();

    return $query->rowCount();
}

// Update query
function queryUpdate($db, $queryUpdate): ?int
{
    $query = $db->prepare($queryUpdate);
    $query->execute();
    return $query->rowCount();
}

// Delete query
function queryDelete($db, $queryDelete): int
{
    $query = $db->prepare($queryDelete);
    $query->execute();
    return $query->rowCount();
}