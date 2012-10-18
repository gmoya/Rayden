<?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
  <?php foreach ($fields as $name => $field): ?>
    <?php $campos[$name] = $field ?>
    <?php $class[$name] = 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name ?>
  <?php endforeach ?>
<?php endforeach ?>

<div id="form-datos-laborales" class="form">
  <?php if ($ajax) : ?>
    <?php use_helper('jQuery') ?>
    <?php $url = url_for_form($form, '@empleo') ?>
    <?php echo jq_form_remote_tag(array(
																				'update' 	=> 'sf_admin_container.datos-laborales-form',
																				'url' 		=> $url,
																				'loading'  	=> 'sendingForm("#sf_admin_container.datos-laborales-form")',
																				'complete'	=> 'jQuery.colorbox.resize();'
																			), 
																			array(
																				'method' 	=> 'POST', 
																				'id' 			=> 'datos-laborales-form'
																			)) ?>
    <?php if (!$form->isNew()) : ?>
      <input type="hidden" value="put" name="sf_method">
      <?php endif ?>
  <?php else : ?>
    <?php echo form_tag_for($form, '@empleo', array('id' => 'datos-laborales-form')) ?>
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
    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('datoslaborales/form_fieldset', array('Empleo' => $Empleo, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

   <?php /* include_partial('datoslaborales/form_fieldset', array(
                                                            'form'            => $form,
                                                            'ajax'            => $ajax,
                                                            'class'           => $class,
                                                            'helper'          => $helper,
                                                            'campos'          => $campos,
                                                            'configuration'   => $configuration,
                                                            'Empleo'  => $Empleo,
                                                          ))*/ ?>

      <div class="row-save">
        <?php include_partial('datoslaborales/form_actions', array(
                                                                'form'            => $form,
                                                                'helper'          => $helper,
                                                                'configuration'   => $configuration,
                                                                'Empleo'  => $Empleo,
                                                              )) ?>
      </div>

  </form>
</div>
