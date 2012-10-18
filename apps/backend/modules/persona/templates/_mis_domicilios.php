<div class="pin-header">
	<h2>
		Domicilios
		<?php if (!count($Persona->getDomicilios())) : ?>
		<span class="sf_admin_action_new">
			<a class="colorbox icon new" href="<?php echo url_for('domicilio/new?modulo='.$modulo.'&persona='.$Persona->getId()) ?>" title="Nuevo"> </a>
		</span>
		<?php endif ?>
	</h2>	
</div>
<div class="pin-content">
	<?php if (count($domicilios = $Persona->getDomicilios())) : ?>
		<?php foreach ($domicilios as $dom) : ?>
			<div class="domicilio pin-item">
				<span class="datos-domicilio item-flotante-izq">
					<?php echo $dom ?> <br/>
					<?php if ($dom->getEntreCalles()) : ?>Entre: <?php echo $dom->getEntreCalles() ?><br/> <?php endif ?>
					<?php echo $dom->getLocalidad().' - '.$dom->getProvincia() ?><br/>
					Tel: <?php echo $dom->getTelefono() ?>
				</span>
				<span class="actions-domicilio item-flotante-der">
					<a href="<?php echo url_for('domicilio/edit?modulo='.$modulo.'&id='.$dom->getId()) ?>" title="Editar" class="icon edit colorbox"> </a>
				</span>
			</div>
		<?php endforeach ?>
	<?php else : ?>
	No hay domicilios registrados.
	<?php endif ?>
</div>
