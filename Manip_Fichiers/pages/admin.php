<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['admin']++;
}
include "../data/connexion.php";
$title = 'Demo PHP view ADMIN';
$styleCSS = 'admin.css';
?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->
<div class="container">
    <?php if (
        !$_SESSION['connexion']['connexionOK']
        || !$_SESSION['connexion']['adminOK']
    ) : ?>
        <h1>Seuls les administrateurs ont acces à cette page petit malin !!!</h1>

    <?php else : ?>
        <h1>Bienvenue <?= $_SESSION['connexion']['name'] ?></h1>

        <table>
            <thead>
                <tr>
                    <?php foreach ($users[0] as $key => $value) : ?>
                        <th><?= $key ?> </th>
                    <?php endforeach ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $ind => $user) : ?>
                    <tr>
                        <?php foreach ($user as $key => $value) : ?>
                            <?php if ($key === 'isAdmin') : ?>
                                <!-- <?php switch ($value) {
                                                //case true:
                                                //    $value = 'Yes';
                                                //    break;
                                                //default:
                                                //    $value = 'No';
                                                //    break;
                                        } ?> -->
                                <!-- Lignes ci-dessus remplacées par la ligne ci-dessous -->
                                <?php ($value) ? $value = 'Yes' : $value = 'No'; ?>
                            <?php endif ?>
                            <td><?= $value ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    <?php endif ?>
</div>
<!-- FOOTER -->
<?php include '../partials/footer.php' ?>