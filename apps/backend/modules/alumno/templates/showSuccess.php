<?php use_helper('I18N', 'Date') ?>
<?php include_partial('alumno/assets') ?>

  <?php include_partial('alumno/flashes') ?>
<div id="show-alumno">
	<div id="info-perfil">
		<div id="foto-perfil">
			<span><img src="/images/<?php echo strtolower($Alumno->getPersona()->getTipoSexo()) ?>.gif" /></span>
		</div>
		
		<div id="datos-perfil">
			<ul>
				<li class="nombre-perfil">
					<?php echo $Alumno ?>
    			<a id="alumno_edit" title="Editar" rel="facebox" href="<?php echo url_for('alumno/edit?id='.$Alumno->getLegajo()) ?>">    </a>
				</li>
				<li> <?php echo $Alumno->getPersona()->getEdad() ?>	años</li>
				<li> <?php echo $Alumno->getPersona()->getTipoSexo() ?>	- <?php echo $Alumno->getPersona()->getEstadoCivil() ?></li>
				<li> Nacido el <?php echo $Alumno->getPersona()->getFechaNacimiento('d/m/Y') ?>	en <?php echo $Alumno->getPersona()->getLugarNacimiento() ?></li>
				<li> <?php echo $Alumno->getPersona()->getDocumentoCompleto() ?></li>
				<li> Celular: <?php echo $Alumno->getPersona()->getCelular() ?></li>
				<li> Email: <?php echo $Alumno->getPersona()->getEmail() ?></li>
				<li> <?php echo ($Alumno->getBeca()) ? 'Becado' : '' ?></li>
			</ul>
		</div>
	</div>
	  
		<div class="perfil-lateral">
			<div class="datos-academicos pin">
    		<div class="pin-header">
					<h2>
						Datos Académicos
						<span class="sf_admin_action_new"><a class="colorbox icon new" href="<?php echo url_for('/datosacademicos/new') ?>" title="Nuevo"> </a></span>
					</h2>	
    		</div>
				<div class="pin-content">
					No hay datos académicos.
				</div>
  		</div>
		
			<div class="datos-laborales pin">
  	  	<div class="pin-header">
					<h2>
						Datos Laborales
						<span class="sf_admin_action_new"><a class="colorbox icon new" href="<?php echo url_for('/datoslaborales/new') ?>" title="Nuevo"> </a></span>
					</h2>
    		</div>
				<div class="pin-content">
					No hay datos laborales.
				</div>
  		</div>
  	</div>

	<div class="clear"></div>
</div>
