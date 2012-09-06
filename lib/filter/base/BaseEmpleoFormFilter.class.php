<?php

/**
 * Empleo filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEmpleoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'     => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'tipo_empleo_id' => new sfWidgetFormPropelChoice(array('model' => 'TipoEmpleo', 'add_empty' => true)),
      'cuit'           => new sfWidgetFormFilterInput(),
      'fecha_inicio'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_fin'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cargo'          => new sfWidgetFormFilterInput(),
      'lugar_trabajo'  => new sfWidgetFormFilterInput(),
      'telefono'       => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_created'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_updated'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_deleted'   => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'persona_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'tipo_empleo_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoEmpleo', 'column' => 'id')),
      'cuit'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_inicio'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_fin'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cargo'          => new sfValidatorPass(array('required' => false)),
      'lugar_trabajo'  => new sfValidatorPass(array('required' => false)),
      'telefono'       => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_created'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_updated'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'deleted_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_deleted'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('empleo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empleo';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'persona_id'     => 'ForeignKey',
      'tipo_empleo_id' => 'ForeignKey',
      'cuit'           => 'Number',
      'fecha_inicio'   => 'Date',
      'fecha_fin'      => 'Date',
      'cargo'          => 'Text',
      'lugar_trabajo'  => 'Text',
      'telefono'       => 'Text',
      'created_at'     => 'Date',
      'user_created'   => 'ForeignKey',
      'updated_at'     => 'Date',
      'user_updated'   => 'ForeignKey',
      'deleted_at'     => 'Date',
      'user_deleted'   => 'ForeignKey',
    );
  }
}
