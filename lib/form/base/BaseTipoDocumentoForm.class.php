<?php

/**
 * TipoDocumento form base class.
 *
 * @method TipoDocumento getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoDocumentoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 5)),
      'descripcion' => new sfValidatorString(array('max_length' => 35)),
    ));

    $this->widgetSchema->setNameFormat('tipo_documento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoDocumento';
  }


}
