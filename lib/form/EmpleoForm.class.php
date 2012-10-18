<?php

/**
 * Empleo form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class EmpleoForm extends BaseEmpleoForm
{
  public function configure()
  {
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], 
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id']
				);

		$this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['modulo'] = new sfWidgetFormInputHidden();

		$this->widgetSchema['tipo_empleo_id']->setLabel('Tipo de Empleo');
		$this->widgetSchema['fecha_inicio']->setLabel('Inicio');
		$this->widgetSchema['fecha_fin']->setLabel('Fin');
		$this->widgetSchema['lugar_trabajo']->setLabel('Lugar de Trabajo');
		$this->widgetSchema['telefono']->setLabel('Teléfono');

    $years = range(date('Y') - 30, date('Y'));
    $this->widgetSchema['fecha_inicio']->setOption('years', array_combine($years, $years));
    $this->widgetSchema['fecha_inicio']->setOption('format', '%day%/%month%/%year%');
    $this->widgetSchema['fecha_fin']->setOption('years', array_combine($years, $years));
    $this->widgetSchema['fecha_fin']->setOption('format', '%day%/%month%/%year%');
	
		$this->validatorSchema['cargo']->setOption('required', true);
		$this->validatorSchema['lugar_trabajo']->setOption('required', true);
		$this->validatorSchema['tipo_empleo_id']->setOption('required', true);

		$this->validatorSchema['modulo'] = new sfValidatorPass(array('required' => false));
#    $this->validatorSchema['fecha_inicio'] = new sfValidatorDateRange(array('from_date' => new sfValidatorDate(), 
#																																						'to_date' 	=> new sfValidatorDate(), 
#																																						'to_field' => 'fecha_fin',
#																																						'required' => true
#																																			));

		$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);

  }
}
