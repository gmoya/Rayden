<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.perfil-menu').click(function() {
		if (jQuery(this).hasClass('activo')) {
			jQuery(this).removeClass('activo');
			jQuery('#perfil-menu-list').addClass('oculto');
			jQuery('.icon-list').addClass('icon-open').removeClass('icon-close');
		}	else {
			jQuery(this).addClass('activo');
			jQuery('#perfil-menu-list').removeClass('oculto');
			jQuery('.icon-list').addClass('icon-close').removeClass('icon-open');
		}
	});
/*
	jQuery('.cuenta-menu').blur(function() {
		jQuery(this).removeClass('activo');
		jQuery('#perfil-menu-list').addClass('oculto');
	});
*/
});
</script>

<div id="header">
	<div class="menu-container">
  	<div id="logo"><a href="<?php echo url_for('@homepage') ?>"><img src="" /></a></div>
    <div id="menu">
      <?php include_partial('global/menu') ?>
    </div>
    <div id="cuenta-menu">
			<a class="perfil-menu" href="#" title="Opciones de Perfil">
				<span id="username"><?php echo $sf_user->getUsername() ?></span>
				<span class="icon-list icon-open"></span>
			</a>
			<div id="perfil-menu-list" class="oculto">
				<span id="logout"> <a href="<?php echo url_for('@sf_guard_signout') ?>">Salir</a></span>
			</div>
		</div>
	</div>
</div>
