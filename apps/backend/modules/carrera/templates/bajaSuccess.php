<?php use_helper('I18N', 'Date') ?>
<?php include_partial('carrera/assets') ?>
<?php use_helper('jQuery') ?>

<script type="text/javascript">

jQuery(document).ready(function() {

	var validator = jQuery("#form-baja-carrera").validate({
			rules: {
				'carrera[estado]': {
						required:true,
				},
				'carrera[observaciones]': {
						required:true,
				}
			},
      messages: {
				'carrera[estado]': 'Ingrese el estado',
				'carrera[observaciones]': 'Ingrese una observación'
			},
			errorPlacement: function(error, element) {
					error.insertAfter(element);
					jQuery.colorbox.resize();
			},
			errorElement: "p",
			submitHandler: function(form) {
					sendingForm("#sf_admin_container.carrera-form");
					jQuery(form).find('input[type=submit]').attr('disabled', 'disabled');
					jQuery.ajax({
						type:'POST',
						dataType:'html',
						data:jQuery(form).serialize(),
						success:function(data, textStatus){
								jQuery('#sf_admin_container.baja-carrera-form').html(data);
								jQuery.colorbox.resize();
						},
						url:'<?php echo url_for('carrera/baja?idd='.$Carrera->getId()) ?>'
					}); 
					
					return false;
			}
	});
});

</script>

<div id="sf_admin_container" class="baja-carrera-form carrera-form form">
  <h1>Baja de <?php echo $Carrera->getNombre() ?></h1>

  <div id="sf_admin_header"> </div>

  <div id="sf_admin_content">
		<div id="form-carrera" class="form">
			<form id="form-baja-carrera" method="POST" action="<?php echo url_for('carrera/baja?id='.$Carrera->getId()) ?>">
				<input type="hidden" id="carrera_accion" value="<?php echo $accion ?>" name="carrera[accion]">
			<table>
				<tr>
					<td><label for="carrera_persona_nombre">Estado</label> </td>
					<td  class="campos">
					  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
					    <div>
								<select id="carrera_estado" name="carrera[estado]">
									<option selected="selected" value=""></option>
									<?php foreach ($estados as $clave => $valor) :?>
									<option value="<?php echo $valor ?>"><?php echo $clave ?></option>
									<?php endforeach ?>
								</select>
					    </div>
					  </div>
					</td>
				</tr>
	
				<tr>
					<td><label for="carrera_observaciones">Observaciones</label> </td>
					<td  class="campos">
					  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
					    <div>
								<textarea id="carrera_observaciones" name="carrera[observaciones]"> </textarea>
					    </div>
					  </div>
					</td>
				</tr>
		
			</table>
		
			<div class="row-save">
				<ul class="sf_admin_actions">
					<li class="sf_admin_action_save"><input type="submit" value="<?php echo __('Guardar') ?>"></li>
				</ul>
			</div>
		</form>
	</div>
</div>
