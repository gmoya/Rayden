<table>
	<tr>
		<td>  <?php echo $form['legajo']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['legajo'] ?><?php $form['legajo']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['legajo']->render() ?>
		          <?php echo $form['legajo']->renderError() ?>
		          <?php if ($help = $form['legajo']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>

	<tr>
		<td>  <?php echo $form['persona']['nombre']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['nombre'] ?><?php $form['persona']['nombre']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['nombre']->render() ?>
		          <?php echo $form['persona']['nombre']->renderError() ?>
		          <?php if ($help = $form['persona']['nombre']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['apellido']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['apellido'] ?><?php $form['persona']['apellido']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['apellido']->render() ?>
		          <?php echo $form['persona']['apellido']->renderError() ?>
		          <?php if ($help = $form['persona']['apellido']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['tipo_documento_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['tipo_documento_id'] ?><?php $form['persona']['tipo_documento_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['tipo_documento_id']->render() ?>
		          <?php echo $form['persona']['tipo_documento_id']->renderError() ?>
		          <?php if ($help = $form['persona']['tipo_documento_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['nro_documento']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['nro_documento'] ?><?php $form['persona']['nro_documento']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['nro_documento']->render() ?>
		          <?php echo $form['persona']['nro_documento']->renderError() ?>
		          <?php if ($help = $form['persona']['nro_documento']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['sexo_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['sexo_id'] ?><?php $form['persona']['sexo_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['sexo_id']->render() ?>
		          <?php echo $form['persona']['sexo_id']->renderError() ?>
		          <?php if ($help = $form['persona']['sexo_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['celular']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['celular'] ?><?php $form['persona']['celular']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['celular']->render() ?>
		          <?php echo $form['persona']['celular']->renderError() ?>
		          <?php if ($help = $form['persona']['celular']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['email']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['email'] ?><?php $form['persona']['email']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['email']->render() ?>
		          <?php echo $form['persona']['email']->renderError() ?>
		          <?php if ($help = $form['persona']['email']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['nacionalidad_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['nacionalidad_id'] ?><?php $form['persona']['nacionalidad_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['nacionalidad_id']->render() ?>
		          <?php echo $form['persona']['nacionalidad_id']->renderError() ?>
		          <?php if ($help = $form['persona']['nacionalidad_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['estado_civil_id']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['estado_civil_id'] ?><?php $form['persona']['estado_civil_id']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['estado_civil_id']->render() ?>
		          <?php echo $form['persona']['estado_civil_id']->renderError() ?>
		          <?php if ($help = $form['persona']['estado_civil_id']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['fecha_nacimiento']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['fecha_nacimiento'] ?><?php $form['persona']['fecha_nacimiento']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['fecha_nacimiento']->render() ?>
		          <?php echo $form['persona']['fecha_nacimiento']->renderError() ?>
		          <?php if ($help = $form['persona']['fecha_nacimiento']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['lugar_nacimiento']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['lugar_nacimiento'] ?><?php $form['persona']['lugar_nacimiento']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['lugar_nacimiento']->render() ?>
		          <?php echo $form['persona']['lugar_nacimiento']->renderError() ?>
		          <?php if ($help = $form['persona']['lugar_nacimiento']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['persona']['observaciones']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['persona']['observaciones'] ?><?php $form['persona']['observaciones']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['persona']['observaciones']->render() ?>
		          <?php echo $form['persona']['observaciones']->renderError() ?>
		          <?php if ($help = $form['persona']['observaciones']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>  <?php echo $form['beca']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['beca'] ?><?php $form['beca']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['beca']->render() ?>
		          <?php echo $form['beca']->renderError() ?>
		          <?php if ($help = $form['beca']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
	</tr>

</table>
