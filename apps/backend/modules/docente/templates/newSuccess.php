<?php use_helper('I18N', 'Date') ?>
<?php include_partial('docente/assets') ?>

<div id="sf_admin_container" class="docente-form form">
  <h1><?php echo __('New Docente') ?></h1>

  <?php include_partial('docente/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('docente/form_header', array('Docente' => $Docente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('docente/form', array('Docente' => $Docente,'ajax' => $ajax, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('docente/form_footer', array('Docente' => $Docente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
