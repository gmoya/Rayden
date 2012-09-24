<?php use_helper('I18N', 'Date') ?>
<?php include_partial('carrera/assets') ?>

<div id="sf_admin_container" class="carrera-form">
  <h1><?php echo __('New Carrera', array(), 'messages') ?></h1>

  <?php include_partial('carrera/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('carrera/form_header', array('Carrera' => $Carrera, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('carrera/form', array('Carrera' => $Carrera, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'ajax' => $ajax)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('carrera/form_footer', array('Carrera' => $Carrera, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

