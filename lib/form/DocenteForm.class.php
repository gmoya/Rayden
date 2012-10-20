<?php

/**
 * Docente form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class DocenteForm extends BaseDocenteForm
{
  public function configure()
  {
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], 
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id'],
					$this['persona_id'], $this['legajo']
				);

    $persona_form = new PersonaForm($this->object->getPersona());
		$persona_form->configurarAlumno();

    $this->embedForm('persona', $persona_form);

    $this->widgetSchema['accion'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['accion'] = new sfValidatorPass(array('required' => false));

		$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);

  }

	public function doSave($con = null)
  {
    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->updateObject();


    $persona_form[0] = $this->embeddedForms['persona'];

		if ($this->isNew())
		{
    	$persona_form[0]->getObject()->setCreatedById($this->getObject()->getCreatedById());
		} else {
    	$persona_form[0]->getObject()->setUpdatedById($this->getObject()->getUpdatedById());
		}
		
    $this->saveEmbeddedForms($con, $persona_form);
    $persona = $this->embeddedForms['persona']->getObject();

    if($this->isNew())
    {
      $this->getObject()->setPersonaId($persona->getId());
    }

    $this->object->save($con);

    return $this->object;
	}

}
