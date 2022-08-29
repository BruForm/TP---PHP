<?php
session_start();

if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['text-editor']++;

    // Ecriture des nombres de connexion dans un fichier
    $fichier = "../data/Spy_Connexions.txt";
    $ressource = fopen($fichier, 'w');
    fputcsv($ressource, $_SESSION['spy'], ";");
    fclose($ressource);
//    echo "<PRE>"; var_dump($_SESSION['spy']);echo "</PRE>";
}

// Lecture fichier CSV :
require_once "../actions/text-editor.php";

$title = 'Text Editor';
$styleCSS = 'text-editor.css';
?>

    <!-- HEADER -->
<?php include '../partials/header.php' ?>

    <!-- BODY -->
    <div class="container">
        <h1>Text Editor</h1>

        <form action="" method="post">
            <input type="text" name="file-in" id="file-in">
            <a href="../action/"></a>
            <button>LOAD</button>
            <input type="button" value="LOAD">
            <textarea name="text-in" id="text-in" cols="30" rows="10">
                <?php foreach ($tabLines as $line) : ?>
                    <?= $line ?>
                <?php endforeach; ?>
            </textarea>
            <input type="text" name="file-out" id="file-out">
            <a href="../action/"></a>
            <button>SAVE</button>
        </form>

    </div>
    <!-- FOOTER -->
<?php include '../partials/footer.php' ?>