<!-- Section avec tous les articles -->
<h1>TOUS LES ARTICLES</h1>

<?php foreach ($_SESSION['posts'] as $post) : ?>
    <article>
        <h2><?= $post->getTitle() ?></h2>
        <small>Publié le <?= $post->getCreatedAt()->format("Y/m/d H:i") ?></small>
<!--        On peut utilliser ->format("[format]") pour formater le DateTime -->
<!--        au lieu de la methode Post->getCreatedAtFormated() -->
        <div class="article-content">
            <?= $post->getContent() ?>
        </div>
    </article>
    <aside>
        <h3>Section commentaires</h3>
        <?php foreach ($post->getComments() as $comment) : ?>
            <strong>Message de <?= $comment->getAuthor() ?>, posté le <?= $comment->getCreatedAtFormated() ?></strong>
            <div><?= $comment->getContent() ?></div>
        <?php endforeach ?>
    </aside>
<?php endforeach ?>