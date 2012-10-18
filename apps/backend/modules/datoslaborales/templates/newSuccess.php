<?php use_helper('I18N', 'Date') ?>
<?php include_partial('datoslaborales/assets') ?>

<div id="sf_admin_container" class="datos-laborales-form form">
  <h1><?php echo __('New Datoslaborales') ?></h1>

  <?php include_partial('datoslaborales/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('datoslaborales/form_header', array('Empleo' => $Empleo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('datoslaborales/form', array('Empleo' => $Empleo,'ajax' => $ajax, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('datoslaborales/form_footer', array('Empleo' => $Empleo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
