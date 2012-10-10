<?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
  <?php foreach ($fields as $name => $field): ?>
    <?php $campos[$name] = $field ?>
    <?php $class[$name] = 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name ?>
  <?php endforeach ?>
<?php endforeach ?>

<div id="form-domicilio" class="form">
  <?php if ($ajax) : ?>
    <?php use_helper('jQuery') ?>
    <?php $url = url_for_form($form, '@domicilio') ?>
    <?php echo jq_form_remote_tag(array(
																				'update' 	=> 'sf_admin_container.domicilio-form',
																				'url' 		=> $url,
																				'loading'  	=> 'sendingForm("#sf_admin_container.domicilio-form")',
																				'complete'	=> 'jQuery.colorbox.resize();'
																			), 
																			array(
																				'method' 	=> 'POST', 
																				'id' 			=> 'form-domicilio'
																			)) ?>
    <?php if (!$form->isNew()) : ?>
      <input type="hidden" value="put" name="sf_method">
      <?php endif ?>
  <?php else : ?>
    <?php echo form_tag_for($form, '@domicilio', array('id' => 'domicilio-form')) ?>
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
   <?php include_partial('domicilio/form_fieldset', array(
                                                            'form'            => $form,
                                                            'ajax'            => $ajax,
                                                            'class'           => $class,
                                                            'helper'          => $helper,
                                                            'campos'          => $campos,
                                                            'configuration'   => $configuration,
                                                            'Domicilio'  => $Domicilio,
                                                          )) ?>

      <div class="row-save">
        <?php include_partial('domicilio/form_actions', array(
                                                                'form'            => $form,
                                                                'helper'          => $helper,
                                                                'configuration'   => $configuration,
                                                                'Domicilio'  => $Domicilio,
                                                              )) ?>
      </div>

  </form>
</div>
