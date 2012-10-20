<?php use_helper('I18N', 'Date') ?>
<?php include_partial('carrera/assets') ?>
<?php include_partial('carrera/flashes') ?>

<div id="show-carrera">
	<div id="info-perfil" class="lateral-izquierdo">
		<div id="foto-perfil">
			<span><!--<img src="/images/<?php # echo strtolower($Carrera->getPersona()->getTipoSexo()) ?>.gif" />--></span>
		</div>
		
		<div id="datos-perfil">
			<?php include_partial('carrera/datos_perfil', array('Carrera' => $Carrera)) ?>
		</div>
  </div>
	
	<div class="perfil-lateral lateral-derecho">
		<div id="materias" class="materias pin">
			<?php include_partial('carrera/materias', array('Carrera' => $Carrera)) ?>
  	</div>
  </div>

	<div class="clear"></div>
</div>
