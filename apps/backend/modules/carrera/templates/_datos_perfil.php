<ul>
	<li class="nombre-perfil">
		<span><?php echo $Carrera ?></span>
		<span class="perfil-actions">
			<a id="carrera_edit" class="colorbox icon edit" title="Editar" href="<?php echo url_for('carrera/edit?id='.$Carrera->getId().'&accion=show') ?>">    </a>
		<?php if (!$Carrera->isDadaBaja()) : ?>
			<a id="carrera_baja" class="colorbox icon delete" title="Baja" href="<?php echo url_for('carrera/baja?id='.$Carrera->getId().'&accion=show') ?>">    </a>
		<?php endif ?>
		</span>
	</li>
	<li> Estado: <?php echo $Carrera->getNombreEstado() ?></li>
	<li> Descripción: <?php echo $Carrera->getDescripcion() ?></li>
	<li> Observaciones: <?php echo $Carrera->getObservaciones() ?></li>
</ul>

