<div class="pin-header">
	<h2>
		Datos Laborales
		<span class="sf_admin_action_new">
			<a class="colorbox icon new" href="<?php echo url_for('/datoslaborales/new?modulo='.$modulo.'&persona='.$Persona->getId()) ?>" title="Nuevo"> </a>
		</span>
	</h2>	
</div>
<div class="pin-content">
	<?php if (count($datos = $Persona->getEmpleos())) : ?>
		<?php foreach ($datos as $dato) : ?>
			<div class="dato-laboral pin-item">
				<span class="datos-titulo item-flotante-izq">
					<strong><?php echo $dato->getFechaInicio('m/y').' - '.$dato->getFechaFin('m/y') ?> </strong>- 
					<?php echo $dato->getCargo() ?> - 
					<?php echo $dato->getLugarTrabajo() ?>
				</span>
				<span class="actions-datos-laborales item-flotante-der">
					<a href="<?php echo url_for('datoslaborales/edit?modulo='.$modulo.'&id='.$dato->getId()) ?>" title="Editar" class="icon edit colorbox"> </a>
				</span>
			</div>
		<?php endforeach ?>
	<?php else : ?>
	No hay datos laborales.
	<?php endif ?>
</div>
