<?php  if (count($login_errors) > 0) : ?>
  <div class="error" id="loginErrors">
  	<ul>
  		<?php foreach ($login_errors as $error) : ?>
  	  	<li><?php echo $error ?></li>
  		<?php endforeach ?>
	</ul>
  </div>
<?php  endif ?>