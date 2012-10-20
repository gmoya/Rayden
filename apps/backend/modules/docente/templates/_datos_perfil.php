<ul>
	<li class="nombre-perfil">
		<span><?php echo $Docente ?></span>
		<span class="perfil-actions">
			<a id="docente_edit" class="colorbox icon edit" title="Editar" href="<?php echo url_for('docente/edit?id='.$Docente->getId().'&accion=show') ?>">    </a>
		<?php if (!$Docente->isDadoBaja()) : ?>
			<a id="docente_baja" class="colorbox icon delete" title="Baja" href="<?php echo url_for('docente/baja?id='.$Docente->getId().'&accion=show') ?>">    </a>
		<?php endif ?>
		</span>
	</li>
	<li> <?php echo $Docente->getPersona()->getEdad() ?>	años</li>
	<li> <?php echo $Docente->getPersona()->getTipoSexo() ?>	- <?php echo $Docente->getPersona()->getEstadoCivil() ?></li>
	<li> Nacido el <?php echo $Docente->getPersona()->getFechaNacimiento('d/m/Y') ?>	en <?php echo $Docente->getPersona()->getLugarNacimiento() ?></li>
	<li> <?php echo $Docente->getPersona()->getDocumentoCompleto() ?></li>
	<li> Celular: <?php echo $Docente->getPersona()->getCelular() ?></li>
	<li> Email: <?php echo $Docente->getPersona()->getEmail() ?></li>
	<li> Estado: <?php echo $Docente->getNombreEstado() ?></li>
	<li> Observaciones: <?php echo nl2br($Docente->getPersona()->getObservaciones()) ?></li>
</ul>
