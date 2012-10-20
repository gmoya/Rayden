<?php use_helper('I18N', 'Date') ?>
<?php include_partial('docente/assets') ?>
<?php use_helper('jQuery') ?>

<script type="text/javascript">

jQuery(document).ready(function() {

	var validator = jQuery("#form-baja-docente").validate({
			rules: {
				'docente[estado]': {
						required:true,
				},
				'docente[observaciones]': {
						required:true,
				}
			},
      messages: {
				'docente[estado]': 'Ingrese el estado',
				'docente[observaciones]': 'Ingrese una observación'
			},
			errorPlacement: function(error, element) {
					error.insertAfter(element);
					jQuery.colorbox.resize();
			},
			errorElement: "p",
			submitHandler: function(form) {
					sendingForm("#sf_admin_container.docente-form");
					jQuery(form).find('input[type=submit]').attr('disabled', 'disabled');
					jQuery.ajax({
						type:'POST',
						dataType:'html',
						data:jQuery(form).serialize(),
						success:function(data, textStatus){
								jQuery('#sf_admin_container.baja-docente-form').html(data);
								jQuery.colorbox.resize();
						},
						url:'<?php echo url_for('docente/baja?idd='.$Docente->getId()) ?>'
					}); 
					
					return false;
			}
	});
});

</script>

<div id="sf_admin_container" class="baja-docente-form docente-form form">
  <h1>Baja de <?php echo $Docente ?> </h1>

  <div id="sf_admin_header"> </div>

  <div id="sf_admin_content">
		<div id="form-docente" class="form">
			<form id="form-baja-docente" method="POST" action="<?php echo url_for('docente/baja?id='.$Docente->getId()) ?>">
				<input type="hidden" id="docente_accion" value="<?php echo $accion ?>" name="docente[accion]">
				<table>
					<tr>
						<td><label for="docente_persona_nombre">Estado</label> </td>
						<td  class="campos">
						  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
						    <div>
									<select id="docente_estado" name="docente[estado]">
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
						<td><label for="docente_observaciones">Observaciones</label> </td>
						<td  class="campos">
						  <div class="<?php #echo $class['persona']['nombre'] ?><?php # $form['persona']['nombre']->hasError() and print ' errors' ?>">
						    <div>
									<textarea id="docente_observaciones" name="docente[observaciones]"> </textarea>
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
</div>
