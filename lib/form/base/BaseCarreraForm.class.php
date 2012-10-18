<?php

/**
 * Carrera form base class.
 *
 * @method Carrera getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'descripcion'   => new sfWidgetFormTextarea(),
      'estado'        => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
      'created_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'updated_at'    => new sfWidgetFormDateTime(),
      'updated_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'deleted_at'    => new sfWidgetFormDateTime(),
      'deleted_by_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 100)),
      'descripcion'   => new sfValidatorString(),
      'estado'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'created_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
      'deleted_by_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Carrera';
  }


}
