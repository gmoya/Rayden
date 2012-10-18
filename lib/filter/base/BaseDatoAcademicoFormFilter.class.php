<?php

/**
 * DatoAcademico filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDatoAcademicoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'             => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'tipo_titulo_id'         => new sfWidgetFormPropelChoice(array('model' => 'TipoTitulo', 'add_empty' => true)),
      'titulo_obtenido'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'establecimiento'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anio_titulo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'jurisdiccion'           => new sfWidgetFormFilterInput(),
      'titulo_nacionalidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'estatal'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'visado'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_visado'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'observaciones'          => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'deleted_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'persona_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'tipo_titulo_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoTitulo', 'column' => 'id')),
      'titulo_obtenido'        => new sfValidatorPass(array('required' => false)),
      'establecimiento'        => new sfValidatorPass(array('required' => false)),
      'anio_titulo'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'jurisdiccion'           => new sfValidatorPass(array('required' => false)),
      'titulo_nacionalidad_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Nacionalidad', 'column' => 'id')),
      'estatal'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'visado'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_visado'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'observaciones'          => new sfValidatorPass(array('required' => false)),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'deleted_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted_by_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dato_academico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DatoAcademico';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'persona_id'             => 'ForeignKey',
      'tipo_titulo_id'         => 'ForeignKey',
      'titulo_obtenido'        => 'Text',
      'establecimiento'        => 'Text',
      'anio_titulo'            => 'Number',
      'jurisdiccion'           => 'Text',
      'titulo_nacionalidad_id' => 'ForeignKey',
      'estatal'                => 'Boolean',
      'visado'                 => 'Boolean',
      'fecha_visado'           => 'Date',
      'observaciones'          => 'Text',
      'created_at'             => 'Date',
      'created_by_id'          => 'ForeignKey',
      'updated_at'             => 'Date',
      'updated_by_id'          => 'ForeignKey',
      'deleted_at'             => 'Date',
      'deleted_by_id'          => 'ForeignKey',
    );
  }
}
