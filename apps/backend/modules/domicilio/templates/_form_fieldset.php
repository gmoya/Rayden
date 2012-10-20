<script type="text/javascript">
	jQuery(document).ready(function(){
		listaPcia = jQuery('#domicilio_provincia_id');
		listaLoc = jQuery('#domicilio_localidad_id');

		listaPcia.change(cambiarLocalidades);
		listaPcia.keyup(cambiarLocalidades);

		function cambiarLocalidades() {
			listaLoc.html('');
			
			jQuery.ajax({
				type:'GET',
				dataType:'html',
				success:function(data, textStatus) {
					listaLoc.html(data);
					var width = jQuery('#sf_admin_container.domicilio-form table').width();
					if (width > 0) {
						jQuery.colorbox.resize({ width: width + 50 });
					} else {
						jQuery.colorbox.resize();
					}
<?php if (($_POST && ($localidad = $_POST['domicilio']['localidad_id'])) || (!$form->isNew() && ($localidad = $form->getObject()->getLocalidadId()))) : ?>
					listaLoc.find('option[value="<?php echo $localidad ?>"]').attr('selected', 'selected');
<?php endif ?>
				},
				url:'<?php echo url_for('domicilio/elegirPorProvincia') ?>?id=' + listaPcia.val() 
			});
		}

<?php if (($_POST && ($localidad = $_POST['domicilio']['localidad_id'])) || (!$form->isNew() && ($localidad = $form->getObject()->getLocalidadId()))) : ?>
		listaPcia.change();
<?php endif ?>
	});
</script>

<table>
	<tr>
		<td>  <?php echo $form['calle']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['calle'] ?><?php $form['calle']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['calle']->render() ?>
		          <?php echo $form['calle']->renderError() ?>
		          <?php if ($help = $form['calle']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
		<td  class="campos campo-small" colspan="2">
			<?php echo $form['altura']->renderLabel() ?>
		  <?php echo $form['altura']->render() ?>
		  <?php echo $form['altura']->renderError() ?>
			<?php echo $form['torre']->renderLabel() ?>
		  <?php echo $form['torre']->render() ?>
		  <?php echo $form['torre']->renderError() ?>
			<?php echo $form['piso']->renderLabel() ?>
		  <?php echo $form['piso']->render() ?>
		  <?php echo $form['piso']->renderError() ?>
			<?php echo $form['dpto']->renderLabel() ?>
		  <?php echo $form['dpto']->render() ?>
		  <?php echo $form['dpto']->renderError() ?>
		</td>
	</tr>

	<tr>
		<td>  <?php echo $form['entre_calles']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['entre_calles'] ?><?php $form['entre_calles']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['entre_calles']->render() ?>
		          <?php echo $form['entre_calles']->renderError() ?>
		          <?php if ($help = $form['entre_calles']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
		<td  class="campos campo-small" colspan="2">
			<?php echo $form['escalera']->renderLabel() ?>
		  <?php echo $form['escalera']->render() ?>
		  <?php echo $form['escalera']->renderError() ?>
			<?php echo $form['nudo']->renderLabel() ?>
		  <?php echo $form['nudo']->render() ?>
		  <?php echo $form['nudo']->renderError() ?>
			<?php echo $form['ala']->renderLabel() ?>
		  <?php echo $form['ala']->render() ?>
		  <?php echo $form['ala']->renderError() ?>
			<?php echo $form['parcela']->renderLabel() ?>
		  <?php echo $form['parcela']->render() ?>
		  <?php echo $form['parcela']->renderError() ?>
		</td>

	</tr>
	<tr>
		<td>  <?php echo $form['provincia_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['provincia_id'] ?><?php $form['provincia_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['provincia_id']->render() ?>
		          <?php echo $form['provincia_id']->renderError() ?>
		          <?php if ($help = $form['provincia_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>

		<td>  <?php echo $form['localidad_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['localidad_id'] ?><?php $form['localidad_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['localidad_id']->render() ?>
		          <?php echo $form['localidad_id']->renderError() ?>
		          <?php if ($help = $form['localidad_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['codigo_postal']->renderLabel() ?></td>
		<td  class="campos campo-small">
		  <div class="<?php echo $class['codigo_postal'] ?><?php $form['codigo_postal']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['codigo_postal']->render() ?>
		          <?php echo $form['codigo_postal']->renderError() ?>
		          <?php if ($help = $form['codigo_postal']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
		<td>  <?php echo $form['telefono']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['telefono'] ?><?php $form['telefono']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['telefono']->render() ?>
		          <?php echo $form['telefono']->renderError() ?>
		          <?php if ($help = $form['telefono']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>

</table>
