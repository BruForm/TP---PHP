<?php include '../data/usersData.php' ?>
<?php $title = 'Demo PHP view Users'; ?>
<?php $styleCSS = 'users.css'; ?>

<?php include '../partials/header.php' ?>

<h1>Bonjour</h1>

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

<?php include '../partials/footer.php' ?>