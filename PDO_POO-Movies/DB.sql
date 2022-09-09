SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";

--
-- Base de données : `movies`
--
CREATE
DATABASE IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE
`movies`;

-- --------------------------------------------------------
--
-- DIRECTOR ---------------------------------------------------
DROP TABLE IF EXISTS director;
CREATE TABLE director
(
    id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    directorName varchar(255) NOT NULL
);
INSERT INTO director
VALUES (1, 'Georges Lucas');
--
INSERT INTO director
VALUES (2, 'Paul Verhoeven');
--
-- COMPOSITOR ---------------------------------------------------
DROP TABLE IF EXISTS compositor;
CREATE TABLE compositor
(
    id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    compositorName varchar(255) NOT NULL
);
INSERT INTO compositor
VALUES (1, 'John Williams');
--
INSERT INTO compositor
VALUES (2, 'Basil Poledouris');
--
-- ACTOR ---------------------------------------------------
DROP TABLE IF EXISTS actor;
CREATE TABLE actor
(
    id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    actorName varchar(255) NOT NULL
);
INSERT INTO actor
VALUES (1, 'Casper Van Dien');
--
INSERT INTO actor
VALUES (2, 'Dina Meyer');
--
INSERT INTO actor
VALUES (3, 'Denise Richards');
--
INSERT INTO actor
VALUES (4, 'Neil Patrick Harris');
--
INSERT INTO actor
VALUES (5, 'Michael Ironside');
--
INSERT INTO actor
VALUES (6, 'Mark Hamill');
--
INSERT INTO actor
VALUES (7, 'Harrison Ford');
--
INSERT INTO actor
VALUES (8, 'Carrie Fisher');
--
INSERT INTO actor
VALUES (9, 'Alec Guinness');
--
INSERT INTO actor
VALUES (10, 'Anthony Daniels');
--
-- MOVIE ---------------------------------------------------
DROP TABLE IF EXISTS movie;
CREATE TABLE movie
(
    id            INTEGER PRIMARY KEY AUTO_INCREMENT,
    title         varchar(255) NOT NULL,
    duration      int          NOT NULL,
    cover         varchar(255) DEFAULT NULL,
    synopsis      varchar(255) DEFAULT NULL,
    releasedAt    DATETIME     DEFAULT NULL,
    genre         varchar(255) DEFAULT NULL,
    director_id   INTEGER,
    foreign key (director_id) references director (id),
    compositor_id INTEGER,
    foreign key (compositor_id) references compositor (id)
);
INSERT INTO movie
VALUES (1, 'Star Wars, a new hope', 121,
        'https://upload.wikimedia.org/wikipedia/en/8/87/StarWarsMoviePoster1977.jpg',
        'A good movie', "1977-05-25 00:00:00", 'SF', 1, 1);
--
INSERT INTO movie
VALUES (2, 'Starship Troopers', 129,
        'https://upload.wikimedia.org/wikipedia/en/d/df/Starship_Troopers_-_movie_poster.jpg',
        'An other good movie', "1997-10-07 00:00:00", 'SF', 2, 2);
--
-- MOVIE-ACTOR ---------------------------------------------------
DROP TABLE IF EXISTS movie_actor;
CREATE TABLE movie_actor
(
    id       INTEGER PRIMARY KEY AUTO_INCREMENT,
    movie_id INTEGER,
    foreign key (movie_id) references movie (id),
    actor_id INTEGER,
    foreign key (actor_id) references actor (id)
);
INSERT INTO movie_actor
VALUES (NULL, 1, 6);
INSERT INTO movie_actor
VALUES (NULL, 1, 7);
INSERT INTO movie_actor
VALUES (NULL, 1, 8);
INSERT INTO movie_actor
VALUES (NULL, 1, 9);
INSERT INTO movie_actor
VALUES (NULL, 1, 10);
INSERT INTO movie_actor
VALUES (NULL, 2, 1);
INSERT INTO movie_actor
VALUES (NULL, 2, 2);
INSERT INTO movie_actor
VALUES (NULL, 2, 3);
INSERT INTO movie_actor
VALUES (NULL, 2, 4);
INSERT INTO movie_actor
VALUES (NULL, 2, 5);
--
--
--
-- COMMIT -- FIN ---------------------------------------------------
COMMIT;
--