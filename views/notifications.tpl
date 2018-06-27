<?php if ( @$successResult != '' ) { ?> 
  <div class="info-success"><?=$successResult?></div>
<?php } ?>

<?php if ( @$resultInfo != '' ) { ?> 
  <div class="info-notification"><?=$resultInfo?></div>
<?php } ?>

<?php if ( @$errorResult != '' ) { ?> 
  <div class="error"><?=$errorResult?></div>
<?php } ?>
