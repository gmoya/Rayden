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

