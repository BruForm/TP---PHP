<?php
require_once "vendor/autoload.php";
use App\Post;

//PDO : PHP Data Object

$host = "localhost";
$user = "root";
$password = "";
$dbname = "pdo_blog";

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname";

// Connexion avec le PDO
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Pour avoir les resultats sous forme de tableau associatif 
    // dans tous les resultats de requetes sur ce PDO
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connexion PDO OK" . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}

$table = "post";
echo "DROP -----------------------------------------------------------------\n";
$queryDropTable = "
DROP TABLE IF EXISTS $table;
);";
try {
    $pdo->query($queryDropTable);
    echo "Table [$table] DROPED" . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo "CREATE TABLE -----------------------------------------------------------------\n";
$queryCreateTable = "
CREATE TABLE $table (
    id INTEGER(6) PRIMARY KEY AUTO_INCREMENT,
    title varchar(255) NOT NULL DEFAULT 'My title'
);";
try {
    $pdo->query($queryCreateTable);
    echo "Table [$table] créée." . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo "INSERT 1 -----------------------------------------------------------------\n";
$queryInsertIntoTable = "
INSERT INTO post (title)
VALUES('1er post');
";
try {
    $pdo->query($queryInsertIntoTable);
    echo "Enregistrement créé." . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo "INSERT 2 -----------------------------------------------------------------\n";
$i = 2;
while ($i <= 3) {
    $queryInsertIntoTable = "
    INSERT INTO post
    VALUES(NULL, '" . $i . "eme post');
    ";
    try {
        $pdo->query($queryInsertIntoTable);
        echo "Enregistrement créé." . PHP_EOL;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $i++;
}
echo "SELECT 1 -----------------------------------------------------------------\n";
$querySelectFromTable = "SELECT * FROM $table";
try {
    $query = $pdo->query($querySelectFromTable);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    // PDO::FETCH_ASSOC => pour avoir le resultat sous forme de tableau associatif
    // si pas mis dans le "setAttribut" général.
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "Select effectué." . PHP_EOL;
    var_dump($result);
    var_dump($results);
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo "SELECT 2 (Objects) -----------------------------------------------------------------\n";
$querySelectFromTable = "SELECT * FROM $table";

try {
    $query = $pdo->query($querySelectFromTable);
    $results = $query->fetchAll(PDO::FETCH_CLASS, Post::class);
    echo "Select effectué." . PHP_EOL;
    var_dump($results);
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo "SELECT 3 (Objects) PREPARE -----------------------------------------------------------------\n";
$querySelectFromTable = "
SELECT * FROM $table
WHERE id = :id
";

try {
    $query = $pdo->prepare($querySelectFromTable);
    $query->setFetchMode(PDO::FETCH_CLASS, Post::class);
    $id = 1;
    $query->bindParam(
        "id", $id
    );
    $query->execute();
    // les 2 lignes ci dessus peuvent etre remplacees par un tableau dans le ->execute
    $query->execute([
        "id" => $id,
    ]);
    $results = $query->fetchAll();
    echo "Select effectué." . PHP_EOL;
    var_dump($results);
} catch (PDOException $e) {
    echo $e->getMessage();
}