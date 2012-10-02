<?php use_helper('I18N', 'Date') ?>
<?php include_partial('alumno/assets') ?>

<div id="sf_admin_container">
  <h1 class="title-list">
		<?php echo __('Alumno List', array(), 'messages') ?>
		<span class="sf_admin_action_new"><a class="colorbox icon new" href="<?php echo url_for('/alumno/new') ?>" title="Nuevo"> </a></span>
	</h1>

	<ul class="title-actions sf_admin_actions">
  	<?php include_partial('alumno/list_batch_actions', array('helper' => $helper)) ?>
  </ul>
  
	<?php include_partial('alumno/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('alumno/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('alumno/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('alumno_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('alumno/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('alumno/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
