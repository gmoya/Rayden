<?php

/**
 * Alumno form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class AlumnoForm extends BaseAlumnoForm
{
  public function configure()
  {
		unset($this['created_at'], $this['user_created'], $this['updated_at'], 
					$this['user_updated'], $this['deleted_at'],	$this['user_deleted'],
					$this['regular'], $this['regular_at'], $this['persona_id']
				);

    $persona_form = new PersonaForm($this->object->getPersona());

    $this->embedForm('persona', $persona_form);
	
		$this->widgetSchema['legajo'] = new sfWidgetFormInputText();
		$this->validatorSchema['legajo'] = new sfValidatorInteger();

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
    	$persona_form[0]->getObject()->setUserCreated($this->getObject()->getUserCreated());
		} else {
    	$persona_form[0]->getObject()->setUserUpdated($this->getObject()->getUserUpdated());
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
