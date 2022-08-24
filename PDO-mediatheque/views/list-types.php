<?php
$pageTitle = "list-types";
$customCssLinks = ['<link rel="stylesheet" href="list-types.css">'];

// Header
include_once "../partials/header.php";
?>

<!-- PAGE CODE -- DEBUT -->

<h1>Liste des types de médias</h1>
<!-- <?= "<PRE>" . var_dump($db) . "</PRE>"; ?> -->

<div class="container-data">
    <?php foreach ($types as $type) : ?>
        <form action="" class="one-row">
            <!-- <label for="name">Nom</label> -->
            <input type="text" name="name" id="name" value="<?= $type['name'] ?>">
            <input type="hidden" name="id" id="id" value="<?= $type['id'] ?>">
        </form>
    <?php endforeach ?>
</div>

<!-- PAGE CODE -- FIN -->

<?php
include_once "../partials/footer.php"
?>
