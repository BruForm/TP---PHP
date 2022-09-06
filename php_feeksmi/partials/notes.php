<?php
// Partie où je gère les notes de la classe.
$notes = [20, 12, 13, 8, 18, 3, 2, 17, 18];
// On ne garde que les notes au dessus de la moyenne
$notes_over_avg = array_filter($notes, function ($note) {
    return $note > 10;
});

?>

<h2>Les notes au dessus de la moyenne</h2>
<!--  Technique ! Je fais une boucle sur mon tableau pour pas me répéter ! MALIN ☺️ -->
<ul>
    <?php foreach ($notes_over_avg as $note) : ?>
        <li><?= $note ?></li>
    <?php endforeach ?>
</ul>

