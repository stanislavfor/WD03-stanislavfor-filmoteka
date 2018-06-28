<?php

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-functions.php');

//$errors = array();

if (array_key_exists('update-film', $_POST)) {

  if ( $_POST['title'] == '') {
    $errors[] = "<p>Необходимо ввести название фильма.</p>";
  }
  if ( $_POST['genre'] == '') {
    $errors[] = "<p>Необходимо ввести название жанра.</p>";
  }
  if ( $_POST['year'] == '') {
    $errors[] = "<p>Необходимо ввести год фильма.</p>";
  }
  //if ( $_POST['photo'] == '') {
    //$errors[] = "<p>Необходимо загрузить изображение фильма.</p>";
  //}

  if ( empty($errors) ) {

    $result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id']);
    if ( $result) {
          $successResult = "<p>Фильм редактирован успешно! &#128578;</p>";
    } else { 
        $errorResult = "<p>Запись не была редактирована. Добавьте фильм еще раз. &#128532;</p>";
    }
  }
}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

 
?>
