<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php if ($ajax) : ?>
    <?php use_helper('jQuery') ?>
    <?php $url = url_for_form($form, '@carrera') ?>
    <?php echo jq_form_remote_tag(array(
																				'update' 		=> 'sf_admin_container.carrera-form', 
																				'url' 			=> $url,
																				'loading'  	=> 'sendingForm("#sf_admin_container.carrera-form")',
																				'complete'	=> 'jQuery.colorbox.resize();'
																			), 
																	array(
																				'method' 		=> 'POST', 
																				'id' 				=> 'form-carrera', 
																	)) ?>
    <?php if (!$form->isNew()) : ?>
      <input type="hidden" value="put" name="sf_method">
      <?php endif ?>
  <?php else : ?>
  	<?php echo form_tag_for($form, '@carrera') ?>
  <?php endif ?>


    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('carrera/form_fieldset', array('Carrera' => $Carrera, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('carrera/form_actions', array('Carrera' => $Carrera, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
