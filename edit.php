<?php 


$link = mysqli_connect('localhost', 'root', '', 'filmoteka');

if ( mysqli_connect_error() ) {
  die("Ошибка подключения к базе данных. ");
}


$errors = array();

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

  if ( empty($errors) ) {
  $query = "UPDATE films 
            SET title = '". mysqli_real_escape_string($link, $_POST['title']) ."', 
                genre = '". mysqli_real_escape_string($link, $_POST['genre']) ."', 
                year = '". mysqli_real_escape_string($link, $_POST['year']) ."'
                WHERE id = '" . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";

  if ( mysqli_query($link, $query) ) {
  $successResult = "<p>Фильм редактирован успешно!</p>";
  } else { 
  $errorResult = "<p>Запись не была редактирована. Добавьте фильм еще раз.</p>";
  }
  }
}

$query = "SELECT * FROM films WHERE id = '" . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";
$result = mysqli_query($link, $query);
if ( $result = mysqli_query($link, $query) ) {
    $film = mysqli_fetch_array($result);
}

if ( @$_GET['action'] == 'delete') {
  $query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";
 $result = mysqli_query($link, $query);

  if ( mysqli_affected_rows($link) > 0 ) {
    $resultInfo = "<p>Фильм успешно удален из фильмотеки.</p>";
   } 
}

//echo "<pre>";
//print_r($films);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>Фильмотека-Редактировать</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="container user-content pt-35">

    <?php if ( @$successResult != '' ) { ?> 
    <div class="info-success"><?=$successResult?></div>
    <?php } ?>

    <?php if ( @$resultInfo != '' ) { ?> 
    <div class="info-notification"><?=$resultInfo?></div>
    <?php } ?>

    <?php if ( @$errorResult != '' ) { ?> 
    <div class="error"><?=$errorResult?></div>
    <?php } ?>

    <h1 class="title-1">Фильм <?=$film['title']?></h1>

    
      
      <div class="panel-holder mt-0 mb-20">
      <div class="title-4 mt-0">Редактировать фильм</div>
        <form action="edit.php?id=<?=$film['id']?>" method="POST">          

          <?php 
          if ( !empty($errors)) {
            foreach ($errors as $key => $value) {
            echo "<div class='error'>$value</div>";
            }
          }
          ?>

          <label class="label-title">Название фильма</label>
          <!--<input class="input" type="text"  
                placeholder="Такси 2" name="title" 
                value="<?=$film['title']?>" />-->
          <textarea class="mb-20 pl-20 pt-10" cols="62" rows="7" value="<?=$film['title']?>" name="title"><?=$film['title']?></textarea>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" 
                    placeholder="комедия" name="genre" 
                    value="<?=$film['genre']?>" />
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" 
                    placeholder="2000" name="year" 
                    value="<?=$film['year']?>" />
            </div>
          </div>
          <input type="submit" class="button" value="Сохранить редактирование" name="update-film">
        </form>              
      </div>
      <div class="mb-100">  
       <a href="index.php" class="button returns">Вернуться в Фильмотеку</a>
      </div>     
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>