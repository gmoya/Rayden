<?php

/**
 * EstadoCivil form base class.
 *
 * @method EstadoCivil getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEstadoCivilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'descripcion'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'user_created' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'updated_at'   => new sfWidgetFormDateTime(),
      'user_updated' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'   => new sfWidgetFormDateTime(),
      'user_deleted' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 10)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_created' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_updated' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'deleted_at'   => new sfValidatorDateTime(array('required' => false)),
      'user_deleted' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_civil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCivil';
  }


}
