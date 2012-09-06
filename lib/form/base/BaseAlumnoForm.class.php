<?php

/**
 * Alumno form base class.
 *
 * @method Alumno getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'legajo'       => new sfWidgetFormInputHidden(),
      'persona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'beca'         => new sfWidgetFormInputCheckbox(),
      'regular'      => new sfWidgetFormInputCheckbox(),
      'regular_at'   => new sfWidgetFormDateTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'user_created' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'updated_at'   => new sfWidgetFormDateTime(),
      'user_updated' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'   => new sfWidgetFormDateTime(),
      'user_deleted' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'legajo'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getLegajo()), 'empty_value' => $this->getObject()->getLegajo(), 'required' => false)),
      'persona_id'   => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'beca'         => new sfValidatorBoolean(array('required' => false)),
      'regular'      => new sfValidatorBoolean(array('required' => false)),
      'regular_at'   => new sfValidatorDateTime(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_created' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_updated' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'deleted_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_deleted' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }


}
