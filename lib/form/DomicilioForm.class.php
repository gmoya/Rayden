<?php

/**
 * Domicilio form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class DomicilioForm extends BaseDomicilioForm
{
  public function configure()
  {
		unset(
					$this['created_at'], $this['updated_at'], $this['deleted_at'], 
					$this['created_by_id'], $this['updated_by_id'], $this['deleted_by_id']
				);
			
    $choices = array('' => '');

    $this->widgetSchema['localidad_id'] =  new sfWidgetFormChoice(array('choices' => $choices));
    $this->widgetSchema['provincia_id']->setOption('add_empty', true);
    $this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['modulo'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['calle']->setOption('required', true);
		$this->validatorSchema['modulo'] = new sfValidatorPass(array('required' => false));

		$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);
  }
}
