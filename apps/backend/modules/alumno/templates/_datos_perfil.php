<ul>
	<li class="nombre-perfil">
		<span><?php echo $Alumno ?></span>
		<span class="perfil-actions">
			<a id="alumno_edit" class="colorbox icon edit" title="Editar" href="<?php echo url_for('alumno/edit?id='.$Alumno->getId().'&accion=show') ?>">    </a>
		<?php if (!$Alumno->isDadoBaja()) : ?>
			<a id="alumno_baja" class="colorbox icon delete" title="Baja" href="<?php echo url_for('alumno/baja?id='.$Alumno->getId().'&accion=show') ?>">    </a>
		<?php endif ?>
		</span>
	</li>
	<li> <?php echo $Alumno->getPersona()->getEdad() ?>	años</li>
	<li> <?php echo $Alumno->getPersona()->getTipoSexo() ?>	- <?php echo $Alumno->getPersona()->getEstadoCivil() ?></li>
	<li> Nacido el <?php echo $Alumno->getPersona()->getFechaNacimiento('d/m/Y') ?>	en <?php echo $Alumno->getPersona()->getLugarNacimiento() ?></li>
	<li> <?php echo $Alumno->getPersona()->getDocumentoCompleto() ?></li>
	<li> Celular: <?php echo $Alumno->getPersona()->getCelular() ?></li>
	<li> Email: <?php echo $Alumno->getPersona()->getEmail() ?></li>
	<li> <?php echo ($Alumno->getBeca()) ? 'Becado' : '' ?></li>
	<li> Estado: <?php echo $Alumno->getNombreEstado() ?></li>
	<li> Observaciones: <?php echo nl2br($Alumno->getPersona()->getObservaciones()) ?></li>
</ul>
