<?php

/**
 * Materia filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMateriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'carrera_id'  => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => true)),
      'nombre'      => new sfWidgetFormFilterInput(),
      'descripcion' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'carrera_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Carrera', 'column' => 'id')),
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('materia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'carrera_id'  => 'ForeignKey',
      'nombre'      => 'Text',
      'descripcion' => 'Text',
    );
  }
}
