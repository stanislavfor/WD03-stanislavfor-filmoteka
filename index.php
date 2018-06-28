<?php 

require('config.php');
require('database.php');
$link = db_connect();
require('models/films.php');
require('functions/login-functions.php');

if ( @$_GET['action'] == 'delete') {
	
	$result = film_delete( $link, $_GET['id']);

	if ( $result ) {
		$resultInfo = "<p>Фильм успешно удален из фильмотеки. &#128522;</p>";
		} else {
		$resultError = "<p>Запись не была удалена. Удалите фильм еще раз. &#128532;</p>";
		}
}

$films = films_all($link);

//$link = mysqli_connect('localhost', 'root', '', 'filmoteka');
//$link = mysqli_connect(MYSQL_SERVER, 'root', '', 'filmoteka');
//if ( mysqli_connect_error() ) {
//die("Ошибка подключения к базе данных. ");}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/index.tpl');
include('views/footer.tpl');

?>