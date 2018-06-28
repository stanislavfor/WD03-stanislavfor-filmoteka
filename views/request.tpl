<h1>Укажите ваши данные</h1>
<div class="panel-holder mt-30 mb-20">
 <form action="set-cookie.php" method="POST">
     

      <label class="label-title">Ваше имя</label>
      <input class="input" type="text" placeholder="Имя пользователя" name="user-name"/>
      
      <label class="label-title">Ваш город</label>
      <input class="input" type="text" placeholder="Moscow" name="user-city"/>
        
      
      <input type="submit" class="button mt-30" value=" Отправить данные &#10148; " name="user-submit">       
	</form>     

	<form action="unset-cookie.php" method="POST">  
      <input type="submit" class="button mt-30" value="Удалить ваши данные" name="user-unset">       
	</form>     
</div>