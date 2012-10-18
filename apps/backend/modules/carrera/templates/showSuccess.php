<?php use_helper('I18N', 'Date') ?>
<?php include_partial('carrera/assets') ?>
<?php include_partial('carrera/flashes') ?>

<div id="show-carrera">
	<div id="info-perfil" class="lateral-izquierdo">
		<div id="foto-perfil">
			<span><!--<img src="/images/<?php # echo strtolower($Carrera->getPersona()->getTipoSexo()) ?>.gif" />--></span>
		</div>
		
		<div id="datos-perfil">
			<ul>
				<li class="nombre-perfil">
					<?php echo $Carrera ?>
    			<!--<a id="carrera_edit" title="Editar" rel="facebox" href="<?php #echo url_for('carrera/edit?id='.$Carrera->getLegajo()) ?>">    </a>-->
				</li>
				<li> Estado: <?php echo $Carrera->getNombreEstado() ?></li>
				<li> Descripción: <?php echo $Carrera->getDescripcion() ?></li>
				<li> Observaciones: <?php echo $Carrera->getObservaciones() ?></li>
			</ul>
		</div>
  </div>
	
	<div class="perfil-lateral lateral-derecho">
		<div class="datos-academicos pin">
  		<div class="pin-header">
				<h2>
					Materias
					<span class="sf_admin_action_new"><a class="colorbox icon new" href="<?php #echo url_for('/materia/new') ?>" title="Nuevo"> </a></span>
				</h2>	
  		</div>
			<div class="pin-content">
				No hay materias.
			</div>
  	</div>
<!--	
		<div class="datos-laborales pin">
    	<div class="pin-header">
				<h2>
					Datos Laborales
					<span class="sf_admin_action_new"><a class="colorbox icon new" href="<?php #echo url_for('/datoslaborales/new') ?>" title="Nuevo"> </a></span>
				</h2>
  		</div>
			<div class="pin-content">
				No hay datos laborales.
			</div>
  	</div>
-->
  </div>

	<div class="clear"></div>
</div>
