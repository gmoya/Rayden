<?php

/**
 * Domicilio filter form base class.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDomicilioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'    => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'provincia_id'  => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'localidad_id'  => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => true)),
      'telefono'      => new sfWidgetFormFilterInput(),
      'calle'         => new sfWidgetFormFilterInput(),
      'altura'        => new sfWidgetFormFilterInput(),
      'piso'          => new sfWidgetFormFilterInput(),
      'dpto'          => new sfWidgetFormFilterInput(),
      'codigo_postal' => new sfWidgetFormFilterInput(),
      'escalera'      => new sfWidgetFormFilterInput(),
      'torre'         => new sfWidgetFormFilterInput(),
      'nudo'          => new sfWidgetFormFilterInput(),
      'ala'           => new sfWidgetFormFilterInput(),
      'parcela'       => new sfWidgetFormFilterInput(),
      'entre_calles'  => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_created'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_updated'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'deleted_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_deleted'  => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'persona_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'provincia_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'localidad_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Localidad', 'column' => 'id')),
      'telefono'      => new sfValidatorPass(array('required' => false)),
      'calle'         => new sfValidatorPass(array('required' => false)),
      'altura'        => new sfValidatorPass(array('required' => false)),
      'piso'          => new sfValidatorPass(array('required' => false)),
      'dpto'          => new sfValidatorPass(array('required' => false)),
      'codigo_postal' => new sfValidatorPass(array('required' => false)),
      'escalera'      => new sfValidatorPass(array('required' => false)),
      'torre'         => new sfValidatorPass(array('required' => false)),
      'nudo'          => new sfValidatorPass(array('required' => false)),
      'ala'           => new sfValidatorPass(array('required' => false)),
      'parcela'       => new sfValidatorPass(array('required' => false)),
      'entre_calles'  => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_created'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_updated'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'deleted_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_deleted'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('domicilio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Domicilio';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'persona_id'    => 'ForeignKey',
      'provincia_id'  => 'ForeignKey',
      'localidad_id'  => 'ForeignKey',
      'telefono'      => 'Text',
      'calle'         => 'Text',
      'altura'        => 'Text',
      'piso'          => 'Text',
      'dpto'          => 'Text',
      'codigo_postal' => 'Text',
      'escalera'      => 'Text',
      'torre'         => 'Text',
      'nudo'          => 'Text',
      'ala'           => 'Text',
      'parcela'       => 'Text',
      'entre_calles'  => 'Text',
      'created_at'    => 'Date',
      'user_created'  => 'ForeignKey',
      'updated_at'    => 'Date',
      'user_updated'  => 'ForeignKey',
      'deleted_at'    => 'Date',
      'user_deleted'  => 'ForeignKey',
    );
  }
}
