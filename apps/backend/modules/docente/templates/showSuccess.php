<?php use_helper('I18N', 'Date') ?>
<?php include_partial('docente/assets') ?>
<?php include_partial('docente/flashes') ?>

<div id="show-docente">
	<div id="info-perfil" class="lateral-izquierdo">
		<div id="foto-perfil">
			<span><img src="/images/<?php echo strtolower($Docente->getPersona()->getTipoSexo()) ?>.gif" /></span>
		</div>
		
		<div id="datos-perfil">
			<?php include_partial('docente/datos_perfil', array('Docente' => $Docente)) ?>
		</div>

		<div id="mi-domicilio" class="domicilios pin">
			<?php include_partial('persona/mis_domicilios', array('Persona' => $Docente->getPersona(), 'modulo' => 'docente')) ?>
  	</div>
  </div>
	
	<div class="perfil-lateral lateral-derecho">
		<div id="mis-datos-academicos" class="datos-academicos pin">
			<?php include_partial('persona/mis_datos_academicos', array('Persona' => $Docente->getPersona(), 'modulo' => 'docente')) ?>
  	</div>
	
		<div id="mis-empleos" class="datos-laborales pin">
			<?php include_partial('persona/mis_empleos', array('Persona' => $Docente->getPersona(), 'modulo' => 'docente')) ?>
  	</div>
  </div>

	<div class="clear"></div>
</div>
