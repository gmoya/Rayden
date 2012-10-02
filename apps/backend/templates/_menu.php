<ul class="sf-menu sf-navbar sf-js-enabled sf-shadow">
  <?php if ($sf_user->isAuthenticated()) : ?>
    <li class="alumnos"><a class="menu_uno sf-with-ul webnav" href="<?php echo url_for('alumno/index') ?>">Alumnos</a></li>
    <li class="carreras"><a class="menu_uno sf-with-ul webnav" href="<?php echo url_for('carrera/index') ?>">Carreras</a></li>
    <li class="docentes"><a class="menu_uno sf-with-ul webnav" href="<?php echo url_for('docente/index') ?>">Docentes</a></li>
		<?php #if ($sf_user->isSuperAdmin()) : ?>
		<li><?php echo link_to('Usuarios', '@sf_guard_user') ?></li>
		<?php #endif ?>
	<?php endif ?>
</ul>
