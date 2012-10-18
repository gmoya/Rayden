<?php use_helper('I18N', 'Date') ?>
<?php include_partial('alumno/assets') ?>
<?php include_partial('alumno/flashes') ?>

<div id="show-alumno">
	<div id="info-perfil" class="lateral-izquierdo">
		<div id="foto-perfil">
			<span><img src="/images/<?php echo strtolower($Alumno->getPersona()->getTipoSexo()) ?>.gif" /></span>
		</div>
		
		<div id="datos-perfil">
			<?php include_partial('alumno/datos_perfil', array('Alumno' => $Alumno)) ?>
		</div>

		<div id="mi-domicilio" class="domicilios pin">
			<?php include_partial('persona/mis_domicilios', array('Persona' => $Alumno->getPersona(), 'modulo' => 'alumno')) ?>
  	</div>
  </div>
	
	<div class="perfil-lateral lateral-derecho">
		<div id="mis-datos-academicos" class="datos-academicos pin">
			<?php include_partial('persona/mis_datos_academicos', array('Persona' => $Alumno->getPersona(), 'modulo' => 'alumno')) ?>
  	</div>
	
		<div id="mis-empleos" class="datos-laborales pin">
			<?php include_partial('persona/mis_empleos', array('Persona' => $Alumno->getPersona(), 'modulo' => 'alumno')) ?>
  	</div>
  </div>

	<div class="clear"></div>
</div>
