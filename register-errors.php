<?php  if (count($register_errors) > 0) : ?>
  <div class="error" id="registerErrors">
  	<ul>
  		<?php foreach ($register_errors as $error) : ?>
  	  	<li><?php echo $error ?></li>
  		<?php endforeach ?>
	</ul>
  </div>
<?php  endif ?>