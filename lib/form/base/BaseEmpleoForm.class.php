<?php

/**
 * Empleo form base class.
 *
 * @method Empleo getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEmpleoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'persona_id'     => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'tipo_empleo_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoEmpleo', 'add_empty' => false)),
      'cuit'           => new sfWidgetFormInputText(),
      'fecha_inicio'   => new sfWidgetFormDate(),
      'fecha_fin'      => new sfWidgetFormDate(),
      'cargo'          => new sfWidgetFormInputText(),
      'lugar_trabajo'  => new sfWidgetFormInputText(),
      'telefono'       => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'user_created'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'updated_at'     => new sfWidgetFormDateTime(),
      'user_updated'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'     => new sfWidgetFormDateTime(),
      'user_deleted'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'persona_id'     => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'tipo_empleo_id' => new sfValidatorPropelChoice(array('model' => 'TipoEmpleo', 'column' => 'id')),
      'cuit'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'fecha_inicio'   => new sfValidatorDate(),
      'fecha_fin'      => new sfValidatorDate(),
      'cargo'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'lugar_trabajo'  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'telefono'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'user_created'   => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'user_updated'   => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'deleted_at'     => new sfValidatorDateTime(array('required' => false)),
      'user_deleted'   => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empleo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empleo';
  }


}