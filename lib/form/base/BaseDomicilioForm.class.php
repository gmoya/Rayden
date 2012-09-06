<?php

/**
 * Domicilio form base class.
 *
 * @method Domicilio getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDomicilioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'persona_id'    => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'provincia_id'  => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'localidad_id'  => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => false)),
      'telefono'      => new sfWidgetFormInputText(),
      'calle'         => new sfWidgetFormInputText(),
      'altura'        => new sfWidgetFormInputText(),
      'piso'          => new sfWidgetFormInputText(),
      'dpto'          => new sfWidgetFormInputText(),
      'codigo_postal' => new sfWidgetFormInputText(),
      'escalera'      => new sfWidgetFormInputText(),
      'torre'         => new sfWidgetFormInputText(),
      'nudo'          => new sfWidgetFormInputText(),
      'ala'           => new sfWidgetFormInputText(),
      'parcela'       => new sfWidgetFormInputText(),
      'entre_calles'  => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'user_created'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'updated_at'    => new sfWidgetFormDateTime(),
      'user_updated'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'    => new sfWidgetFormDateTime(),
      'user_deleted'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'persona_id'    => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'provincia_id'  => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'localidad_id'  => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id')),
      'telefono'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'calle'         => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'altura'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'piso'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'dpto'          => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'codigo_postal' => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'escalera'      => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'torre'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'nudo'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ala'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'parcela'       => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'entre_calles'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'user_created'  => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'user_updated'  => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
      'user_deleted'  => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('domicilio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Domicilio';
  }


}
