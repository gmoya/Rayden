<?php use_helper('I18N', 'Date') ?>
<?php include_partial('datosacademicos/assets') ?>

<div id="sf_admin_container" class="datos-academicos-form form">
  <h1><?php echo __('Edit DatoAcademico', array(), 'messages') ?></h1>

  <?php include_partial('datosacademicos/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('datosacademicos/form_header', array('DatoAcademico' => $DatoAcademico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('datosacademicos/form', array('DatoAcademico' => $DatoAcademico, 'ajax' => $ajax, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('datosacademicos/form_footer', array('DatoAcademico' => $DatoAcademico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
