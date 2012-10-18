<div class="pin-header">
	<h2>
		Datos Académicos
		<span class="sf_admin_action_new">
			<a class="colorbox icon new" href="<?php echo url_for('/datosacademicos/new?modulo='.$modulo.'&persona='.$Persona->getId()) ?>" title="Nuevo"> </a>
		</span>
	</h2>	
</div>
<div class="pin-content">
	<?php if (count($datos = $Persona->getDatoAcademicos())) : ?>
		<?php foreach ($datos as $dato) : ?>
			<div class="dato-academico pin-item">
				<span class="datos-titulo item-flotante-izq">
					<strong><?php echo $dato->getAnioTitulo() ?></strong> -
					<?php echo $dato->getTipoTitulo() ?> - 
					<?php echo $dato->getTituloObtenido() ?>
				</span>
				<span class="actions-domicilio item-flotante-der">
					<a href="<?php echo url_for('datosacademicos/edit?modulo='.$modulo.'&id='.$dato->getId()) ?>" title="Editar" class="icon edit colorbox"> </a>
				</span>
			</div>
		<?php endforeach ?>
	<?php else : ?>
	No hay datos académicos.
	<?php endif ?>
</div>
