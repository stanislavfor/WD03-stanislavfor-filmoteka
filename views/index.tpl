<h1 class="title-1">Наша фильмотека &#10032; &#10032; &#10032;</h1>
<?php foreach ($films as $key => $film) { ?>
      <div class="card mb-20">
            
            <div class="row">
                  <?php if ( $film['photo'] != '') { ?>
                        <!-- col-4 -->
                        <div class="col-auto">
                              <img height="200" src="<?=HOST?>data/films/min/<?=$film['photo']?>" alt="<?=$film['title']?>">
                        </div>      
                   <?php } ?>                       
                  
                  <div class="col">
                        <div class="card__header">
                              <h4 class="title-4"><?=$film['title']?></h4>
                              <div class="buttons">
                              <a href="edit.php?id=<?=$film['id']?>" class="button button--edit">Редактировать</a>
                              <a href="?action=delete&id=<?=$film['id']?>" class="button button--delete">Удалить</a>
                              </div>
                        </div>
                        <div class="badge"><?=$film['genre']?></div>
                        <div class="badge"><?=$film['year']?></div>
                        <div class="mt-20">
                        <a href="single.php?id=<?=$film['id']?>" class="button">Описание</a>
                        </div>
                  </div>      
                  
            </div>
            
      </div>
<?php } ?>