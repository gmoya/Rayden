<?php

/**
 * Materia form base class.
 *
 * @method Materia getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMateriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'carrera_id'  => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => true)),
      'nombre'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'carrera_id'  => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }


}
