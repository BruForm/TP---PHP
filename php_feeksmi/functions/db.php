<?php
require_once "vendor/autoload.php";
use App\Post\Post;
use App\Post\Comment;

function getDatabase(): array
{
    $posts = [
        new Post('Titre 1', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Post('Titre 2', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Post('Titre 3', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Post('Titre 4', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Post('Titre 5', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
    ];

    $comments = [
        new Comment('Moi', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Comment('Pas moi', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Comment('Lui', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Comment('Encore lui', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
        new Comment('Ielle', 'Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.'),
    ];

    // Je mets mes commentaires dans les Posts
    $posts[0]->addComment($comments[1]);
    $posts[0]->addComment($comments[0]);
    $posts[1]->addComment($comments[2]);
    $posts[1]->addComment($comments[3]);
    $posts[2]->addComment($comments[4]);

    return $posts; 
}
