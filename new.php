<?php

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

$errors = array();

if (array_key_exists('add-film', $_POST)) {

if ( $_POST['title'] == '') {
    $errors[] = "<p>Необходимо ввести название фильма.</p>";
  }
  if ( $_POST['genre'] == '') {
    $errors[] = "<p>Необходимо ввести название жанра.</p>";
  }
  if ( $_POST['year'] == '') {
    $errors[] = "<p>Необходимо ввести год фильма.</p>";
  }

if ( empty($errors)) {
  $result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

    if ( $result) {
      $successResult = "<p>Фильм добавлен в фильмотеку успешно! &#128512;</p>";
      } else { 
      $errorResult = "<p>Запись не была добавлена. Добавьте фильм еще раз. &#128532;</p>";
      }
  }
  
}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');


?>
