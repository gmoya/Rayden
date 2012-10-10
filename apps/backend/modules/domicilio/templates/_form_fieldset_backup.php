<table>
	<tr>
		<td>  <?php echo $form['calle']->renderLabel() ?></td>
		<td  class="campos" colspan="2">
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
		<td>  <?php echo $form['altura']->renderLabel('Nro') ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['altura'] ?><?php $form['altura']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['altura']->render() ?>
		          <?php echo $form['altura']->renderError() ?>
		          <?php if ($help = $form['altura']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
		<td>  <?php echo $form['piso']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['piso'] ?><?php $form['piso']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['piso']->render() ?>
		          <?php echo $form['piso']->renderError() ?>
		          <?php if ($help = $form['piso']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>

		<td>  <?php echo $form['dpto']->renderLabel() ?></td>
		<td  class="campos">
		  <div class="<?php echo $class['dpto'] ?><?php $form['dpto']->hasError() and print ' errors' ?>">
		    <div>
		          <?php echo $form['dpto']->render() ?>
		          <?php echo $form['dpto']->renderError() ?>
		          <?php if ($help = $form['dpto']->renderHelp()) : ?>
		            <div class="help"><?php echo __($help, array(), 'messages') ?></div>
		          <?php endif ?>
		    </div>
		  </div>
		</td>
		<td>  <?php echo $form['codigo_postal']->renderLabel('CP') ?></td>
		<td  class="campos">
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

	</tr>
</table>
