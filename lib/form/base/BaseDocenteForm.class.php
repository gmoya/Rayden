<?php

/**
 * Docente form base class.
 *
 * @method Docente getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDocenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'legajo'        => new sfWidgetFormInputHidden(),
      'persona_id'    => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'created_at'    => new sfWidgetFormDateTime(),
      'created_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'updated_at'    => new sfWidgetFormDateTime(),
      'updated_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'deleted_at'    => new sfWidgetFormDateTime(),
      'deleted_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'legajo'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getLegajo()), 'empty_value' => $this->getObject()->getLegajo(), 'required' => false)),
      'persona_id'    => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'created_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
      'deleted_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('docente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Docente';
  }


}
