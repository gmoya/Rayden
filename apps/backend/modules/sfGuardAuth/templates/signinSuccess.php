<?php use_helper('I18N') ?>
<div id="login-box">
	<div id="login-box-header"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/chinchis.png" /></a></div>
	<div id="login-form">
		<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  		<div id="form-body">
    		<?php echo $form->renderHiddenFields(false) ?>
    		<?php if ($form->hasGlobalErrors()): ?>
      	<?php echo $form->renderGlobalErrors() ?>
    		<?php endif; ?>
				<?php echo $form['username']->renderError() ?>
				<?php # echo $form['username']->renderLabel('Usuario') ?>
				<?php echo $form['username']->render(array('class' => 'form', 'placeHolder' => 'usuario')) ?>
				<?php echo $form['password']->renderError() ?>
				<?php # echo $form['password']->renderLabel('Contraseña') ?>
				<?php echo $form['password']->render(array('class' => 'form', 'placeHolder' => 'password')) ?>
				<?php # echo $form['remember']->renderError() ?>
				<?php # echo $form['remember']->render(array('class' => 'form')) ?>
				<?php # echo $form['remember']->renderLabel('Recordarme', array('class' => 'inline')) ?>
 			</div>

			<div id="form-footer">
  			<input id="boton-login" type="submit" value="Entrar" />
<!--  			<a href="<?php # echo url_for('@sf_guard_password') ?>"><?php #echo __('¿Perdiste la contraseña?') ?></a> -->
  		</div>
		</form>
	</div>
</div>
