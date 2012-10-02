<?php use_helper('I18N', 'Date') ?>
<?php include_partial('alumno/assets') ?>

<div id="sf_admin_container" class="alumno-form form">
  <h1><?php echo __('Edit Alumno', array(), 'messages') ?></h1>

  <?php include_partial('alumno/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('alumno/form_header', array('Alumno' => $Alumno, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('alumno/form', array('Alumno' => $Alumno, 'ajax' => $ajax, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('alumno/form_footer', array('Alumno' => $Alumno, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
