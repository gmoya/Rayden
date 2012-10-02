<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInputText(),
      'apellido'          => new sfWidgetFormInputText(),
      'tipo_documento_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoDocumento', 'add_empty' => true)),
      'nro_documento'     => new sfWidgetFormInputText(),
      'sexo_id'           => new sfWidgetFormPropelChoice(array('model' => 'TipoSexo', 'add_empty' => true)),
      'celular'           => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'nacionalidad_id'   => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'estado_civil_id'   => new sfWidgetFormPropelChoice(array('model' => 'EstadoCivil', 'add_empty' => true)),
      'fecha_nacimiento'  => new sfWidgetFormDate(),
      'lugar_nacimiento'  => new sfWidgetFormInputText(),
      'observaciones'     => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'created_by_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'updated_at'        => new sfWidgetFormDateTime(),
      'updated_by_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'deleted_at'        => new sfWidgetFormDateTime(),
      'deleted_by_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'apellido'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tipo_documento_id' => new sfValidatorPropelChoice(array('model' => 'TipoDocumento', 'column' => 'id', 'required' => false)),
      'nro_documento'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'sexo_id'           => new sfValidatorPropelChoice(array('model' => 'TipoSexo', 'column' => 'id', 'required' => false)),
      'celular'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nacionalidad_id'   => new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id', 'required' => false)),
      'estado_civil_id'   => new sfValidatorPropelChoice(array('model' => 'EstadoCivil', 'column' => 'id', 'required' => false)),
      'fecha_nacimiento'  => new sfValidatorDate(array('required' => false)),
      'lugar_nacimiento'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'observaciones'     => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'created_by_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_by_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'deleted_at'        => new sfValidatorDateTime(array('required' => false)),
      'deleted_by_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }


}
