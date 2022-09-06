<?php
require_once "functions/db.php";
session_start();

//// J'importe les classes dont j'ai besoin 🚂
//require_once "vendor/autoload.php";
//
use App\Post\Post;

//use App\Post\Comment;

// Technique ! Je mets ma fausse base de données dans la session lol  ☺️
if (!isset($_SESSION['posts']) || $_SESSION['posts'] == []) {
    $_SESSION['posts'] = getDatabase();
}

// Vérification de l'ajout d'un nouvel Article.
if (isset($_POST['title']) && isset($_POST['content'])
    && $_POST['title'] != ""
    && $_POST['content'] != "") {
    // On CLEAN ce que l'utilisateur nous envoie !! 💀 Ne PAS lui faire confiance !
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    // Une fois qu'on a tout clean, on peut créer notre Article
    $newPost = new Post($title, $content);
//    array_push($_SESSION['posts'], $newPost);
    $_SESSION['posts'][] = $newPost;
    header('location: /');
}

?>

<!-- Vue  👁️-->
<?php include_once "partials/base/header.php"; ?>

<!-- Section avec les Articles -->
<?php include_once "partials/posts.php"; ?>

<!-- Formulaire pour ajouter les articles -->
<?php include_once "partials/forms/addPost.php"; ?>

<!-- Section avec les notes -->
<?php include_once "partials/notes.php"; ?>

<?php include_once "partials/base/footer.php"; ?>
