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
      'tipo_documento_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoDocumento', 'add_empty' => false)),
      'nro_documento'     => new sfWidgetFormInputText(),
      'sexo_id'           => new sfWidgetFormPropelChoice(array('model' => 'TipoSexo', 'add_empty' => true)),
      'celular'           => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'nacionalidad_id'   => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => false)),
      'estado_civil_id'   => new sfWidgetFormPropelChoice(array('model' => 'EstadoCivil', 'add_empty' => false)),
      'fecha_nacimiento'  => new sfWidgetFormDate(),
      'lugar_nacimiento'  => new sfWidgetFormInputText(),
      'observaciones'     => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'user_created'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'updated_at'        => new sfWidgetFormDateTime(),
      'user_updated'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'        => new sfWidgetFormDateTime(),
      'user_deleted'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'apellido'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tipo_documento_id' => new sfValidatorPropelChoice(array('model' => 'TipoDocumento', 'column' => 'id')),
      'nro_documento'     => new sfValidatorString(array('max_length' => 14)),
      'sexo_id'           => new sfValidatorPropelChoice(array('model' => 'TipoSexo', 'column' => 'id', 'required' => false)),
      'celular'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 50)),
      'nacionalidad_id'   => new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id')),
      'estado_civil_id'   => new sfValidatorPropelChoice(array('model' => 'EstadoCivil', 'column' => 'id')),
      'fecha_nacimiento'  => new sfValidatorDate(),
      'lugar_nacimiento'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'observaciones'     => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'user_created'      => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'user_updated'      => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'deleted_at'        => new sfValidatorDateTime(array('required' => false)),
      'user_deleted'      => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
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
