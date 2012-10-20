<?php

/**
 * Carrera form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class CarreraForm extends BaseCarreraForm
{
  public function configure()
  {
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], $this['estado'],
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id']
				);

    $this->widgetSchema['accion'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['accion'] = new sfValidatorPass(array('required' => false));

		$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);
  }

}
