<?php use_helper('I18N', 'Date') ?>
<?php include_partial('domicilio/assets') ?>

<div id="sf_admin_container" class="domicilio-form form">
  <h1><?php echo __('Edit Domicilio', array(), 'messages') ?></h1>

  <?php include_partial('domicilio/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('domicilio/form_header', array('Domicilio' => $Domicilio, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('domicilio/form', array('Domicilio' => $Domicilio, 'ajax' => $ajax, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('domicilio/form_footer', array('Domicilio' => $Domicilio, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
