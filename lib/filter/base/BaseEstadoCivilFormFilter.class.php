<?php

/**
 * EstadoCivil filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEstadoCivilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_civil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCivil';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'descripcion' => 'Text',
    );
  }
}
