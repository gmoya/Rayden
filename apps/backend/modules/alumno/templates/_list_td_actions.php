<td>
  <ul class="sf_admin_td_actions">
		<li class="sf_admin_action_edit">
			<a class="icon edit colorbox" title="<?php echo __('Edit') ?>" href="<?php echo url_for('alumno/edit?id='.$Alumno->getId()) ?>"> </a>
		</li>
		<li class="sf_admin_action_delete">
			<a class="icon delete colorbox" title="<?php echo __('Baja') ?>" href="<?php echo url_for('alumno/baja?id='.$Alumno->getId()) ?>"> </a>
		</li>
  </ul>
</td>
