<?php
session_start();

if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['fichierCSV']++;

    // Ecriture des nombres de connexion dans un fichier
    $fichier = "../data/Spy_Connexions.txt";
    $ressource = fopen($fichier, 'w');
    fputcsv($ressource, $_SESSION['spy'],";");
    fclose($ressource);
//    echo "<PRE>"; var_dump($_SESSION['spy']);echo "</PRE>";

//    // Ecriture des nombres de connexion dans un fichier
//    $fichier = "../data/Spy_Connexions.txt";
//    if (file_exists($fichier)) {
//        $contenu = file_get_contents($fichier);
//        $tab_contenu = explode(';', $contenu);
//        $pageExists = false;
//        $out = "";
//        foreach ($tab_contenu as $ind => $page) {
//            if ($page === 'fichierCSV') {
//                (int)$tab_contenu[$ind + 1]++;
//                $out .= $tab_contenu[$ind] . ";" . $tab_contenu[$ind + 1] . ";" . $_SESSION['spy']['fichierCSV'];
//                $pageExists = true;
//            } else {
//                if ($ind > 2) {
//                    if ($tab_contenu[$ind - 1] != 'fichierCSV' && $tab_contenu[$ind - 2] != 'fichierCSV') {
//                        $out .= $page . ";";
//                    }
//                } else {
//                    $out .= $page . ";";
//                }
//            }
//        }
//        if ($pageExists) {
//            file_put_contents($fichier, $out);
//        } else {
//            file_put_contents($fichier, $contenu . ';fichierCSV;1;1');
//        }
//    } else {
//        file_put_contents($fichier, 'fichierCSV;1;1');
//    }
}

// Lecture fichier CSV :
require_once "../actions/fichierCSV.php";

$title = 'Fichier CSV';
$styleCSS = 'fichierCSV.css';
?>

    <!-- HEADER -->
<?php include '../partials/header.php' ?>

    <!-- BODY -->
    <div class="container">
        <h1>Fichier CSV</h1>

        <table>
            <?php foreach ($tab_employees as $ind => $employee) : ?>
                <?php if ($ind === 0) : ?>
                    <thead>
                    <tr>
                        <?php foreach ($employee as $info) : ?>
                            <th><?= $info ?> </th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                <?php else : ?>
                    <tbody>
                    <tr>
                        <?php foreach ($employee as $info) : ?>
                            <td><?= $info ?></td>
                        <?php endforeach ?>
                    </tr>
                    </tbody>
                <?php endif ?>
            <?php endforeach ?>
        </table>

    </div>
    <!-- FOOTER -->
<?php include '../partials/footer.php' ?>