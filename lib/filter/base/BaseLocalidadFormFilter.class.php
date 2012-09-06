<?php

/**
 * Localidad filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLocalidadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp'           => new sfWidgetFormFilterInput(),
      'provincia_id' => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'cp'           => new sfValidatorPass(array('required' => false)),
      'provincia_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('localidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localidad';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre'       => 'Text',
      'cp'           => 'Text',
      'provincia_id' => 'ForeignKey',
    );
  }
}
