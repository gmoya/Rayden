<?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
  <?php foreach ($fields as $name => $field): ?>
    <?php $campos[$name] = $field ?>
    <?php $class[$name] = 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name ?>
  <?php endforeach ?>
<?php endforeach ?>

<div id="form-alumno" class="form">
  <?php if ($ajax) : ?>
    <?php use_helper('jQuery') ?>
    <?php $url = url_for_form($form, '@alumno') ?>
    <?php echo jq_form_remote_tag(array(
																				'update' 	=> 'sf_admin_container.alumno-form',
																				'url' 		=> $url,
																				'loading'  	=> 'sendingForm("#sf_admin_container.alumno-form")',
																				'complete'	=> 'jQuery.colorbox.resize();'
																			), 
																			array(
																				'method' 	=> 'POST', 
																				'id' 			=> 'form-alumno'
																			)) ?>
    <?php if (!$form->isNew()) : ?>
      <input type="hidden" value="put" name="sf_method">
      <?php endif ?>
  <?php else : ?>
    <?php echo form_tag_for($form, '@alumno', array('id' => 'alumno-form')) ?>
  <?php endif ?>

    <?php echo $form->renderHiddenFields() ?>
    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    <?php foreach ($form as $field)
        {
            if($field->renderError()) {
#          var_dump($field->getName());
#          var_dump($field->renderError());
            }
        }
    ?>
   <?php include_partial('alumno/form_fieldset', array(
                                                            'form'            => $form,
                                                            'ajax'            => $ajax,
                                                            'class'           => $class,
                                                            'helper'          => $helper,
                                                            'campos'          => $campos,
                                                            'configuration'   => $configuration,
                                                            'Alumno'  => $Alumno,
                                                          )) ?>

      <div class="row-save">
        <?php include_partial('alumno/form_actions', array(
                                                                'form'            => $form,
                                                                'helper'          => $helper,
                                                                'configuration'   => $configuration,
                                                                'Alumno'  => $Alumno,
                                                              )) ?>
      </div>

  </form>
</div>
