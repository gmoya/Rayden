<?php foreach ($localidades as $localidad) : ?>
	<option value="<?php echo $localidad->getId() ?>"><?php echo $localidad->getNombre() ?></option>
<?php endforeach ?>
