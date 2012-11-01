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
			<div id="container" class="<?php echo (!$sf_user->isAuthenticated()) ? 'logout' : 'logged' ?>">
      	<?php if ($sf_user->isAuthenticated()): ?>
            <?php include_partial('global/header') ?>
				<?php endif ?>

				<div id="content">
			    <?php echo $sf_content ?>
				</div>

      	<?php if ($sf_user->isAuthenticated()): ?>
            <?php include_partial('global/footer') ?>
				<?php endif ?>
			</div>
  </body>
</html>
