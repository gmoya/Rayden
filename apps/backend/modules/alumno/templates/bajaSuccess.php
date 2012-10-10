<?php use_helper('I18N', 'Date') ?>
<?php include_partial('alumno/assets') ?>
<?php use_helper('jQuery') ?>

<script type="text/javascript">

jQuery(document).ready(function() {

	var validator = jQuery("#form-baja-alumno").validate({
			rules: {
				'alumno[estado]': {
						required:true,
				},
				'alumno[observaciones]': {
						required:true,
				}
			},
      messages: {
				'alumno[estado]': 'Ingrese el estado',
				'alumno[observaciones]': 'Ingrese una observación'
			},
			errorPlacement: function(error, element) {
					error.insertAfter(element);
					jQuery.colorbox.resize();
			},
			errorElement: "p",
			submitHandler: function(form) {
					sendingForm("#sf_admin_container.alumno-form");
					jQuery(form).find('input[type=submit]').attr('disabled', 'disabled');
					jQuery.ajax({
						type:'POST',
						dataType:'html',
						data:jQuery(form).serialize(),
						success:function(data, textStatus){
								jQuery('#sf_admin_container.baja-alumno-form').html(data);
								jQuery.colorbox.resize();
						},
						url:'<?php echo url_for('/alumno/baja?id='.$Alumno->getId()) ?>'
					}); 
					
					return false;
			}
	});
});

</script>

<div id="sf_admin_container" class="baja-alumno-form alumno-form form">
  <h1>Baja de Alumno</h1>

  <div id="sf_admin_header"> </div>

  <div id="sf_admin_content">
		<div id="form-alumno" class="form">
			<form id="form-baja-alumno" method="POST" action="<?php echo url_for('alumno/baja?id='.$Alumno->getId()) ?>">
		  <?php /* echo jq_form_remote_tag(array(
																					'update' 	=> 'sf_admin_container.alumno-form',
																					'url' 		=> url_for('alumno/baja?id='.$Alumno->getId()),
																					'loading'  	=> 'sendingForm("#sf_admin_container.alumno-form")',
																					'complete'	=> 'jQuery.colorbox.resize();'
																				), 
																				array(
																					'method' 	=> 'POST', 
																					'id' 			=> 'form-baja-alumno'
																				)) */ ?>
			
			<table>
				<tr>
					<td><label for="alumno_persona_nombre">Estado</label> </td>
					<td  class="campos">
					  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
					    <div>
								<select id="alumno_estado" name="alumno[estado]">
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
					<td><label for="alumno_observaciones">Observaciones</label> </td>
					<td  class="campos">
					  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
					    <div>
								<textarea id="alumno_observaciones" name="alumno[observaciones]"> </textarea>
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
