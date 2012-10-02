<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
		<script> 
			jQuery(document).ready(function() { 
				jQuery('.colorbox').colorbox({ title: ' ' });
 				jQuery('.sf_admin_list .sf_admin_row').mouseover(function(){
  				jQuery(this).find('.icon').css('visibility', 'visible');
				});

				jQuery('.sf_admin_list .sf_admin_row').mouseout(function(){
  				jQuery(this).find('.icon').css('visibility', 'hidden');
				});
			});	
		</script>

  </head>
  <body>
      <div id="header">
      	<div class="menu-container">
        	<div id="logo"><a href="<?php echo url_for('@homepage') ?>"><img src="" /></a></div>
          <div id="menu">
            <?php include_partial('global/menu') ?>
          </div>
          <div id="usuario">
      			<span id="username"><?php #echo $sf_user->getUsername() ?></span>
						<span id="logout">
      				<a href="<?php #echo url_for('@sf_guard_signout') ?>" title="Salir"> </a>
    				</span>
					</div>
				</div>
			</div>

			<div id="container">
		    <?php echo $sf_content ?>
			</div>
  </body>
</html>
