<?php

/**
 * TipoEmpleo form base class.
 *
 * @method TipoEmpleo getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoEmpleoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('tipo_empleo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoEmpleo';
  }


}
