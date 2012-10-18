<?php

/**
 * DatoAcademico form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class DatoAcademicoForm extends BaseDatoAcademicoForm
{
  public function configure()
  {
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], 
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id']
				);

		$this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['modulo'] = new sfWidgetFormInputHidden();

		$this->widgetSchema['tipo_titulo_id']->setLabel('Tipo de Título');
		$this->widgetSchema['titulo_obtenido']->setLabel('Título obtenido');
		$this->widgetSchema['anio_titulo']->setLabel('Año de graduación');
		$this->widgetSchema['jurisdiccion']->setLabel('Jurisdicción');
		$this->widgetSchema['titulo_nacionalidad_id']->setLabel('País de Graduación');
	
		# Default Argentina	
		$this->setDefault('titulo_nacionalidad_id', 11);
		
		$this->validatorSchema['modulo'] = new sfValidatorPass(array('required' => false));
		$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);
  }
}
