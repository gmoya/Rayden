<?php

/**
 * DatoAcademico form base class.
 *
 * @method DatoAcademico getObject() Returns the current form's model object
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDatoAcademicoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'persona_id'             => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'tipo_titulo_id'         => new sfWidgetFormPropelChoice(array('model' => 'TipoTitulo', 'add_empty' => false)),
      'titulo_obtenido'        => new sfWidgetFormInputText(),
      'establecimiento'        => new sfWidgetFormInputText(),
      'anio_titulo'            => new sfWidgetFormInputText(),
      'jurisdiccion'           => new sfWidgetFormInputText(),
      'titulo_nacionalidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => false)),
      'estatal'                => new sfWidgetFormInputCheckbox(),
      'visado'                 => new sfWidgetFormInputCheckbox(),
      'fecha_visado'           => new sfWidgetFormDate(),
      'observaciones'          => new sfWidgetFormTextarea(),
      'created_at'             => new sfWidgetFormDateTime(),
      'created_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'updated_at'             => new sfWidgetFormDateTime(),
      'updated_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'deleted_at'             => new sfWidgetFormDateTime(),
      'deleted_by_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'persona_id'             => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id')),
      'tipo_titulo_id'         => new sfValidatorPropelChoice(array('model' => 'TipoTitulo', 'column' => 'id')),
      'titulo_obtenido'        => new sfValidatorString(array('max_length' => 200)),
      'establecimiento'        => new sfValidatorString(array('max_length' => 200)),
      'anio_titulo'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'jurisdiccion'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'titulo_nacionalidad_id' => new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id')),
      'estatal'                => new sfValidatorBoolean(),
      'visado'                 => new sfValidatorBoolean(array('required' => false)),
      'fecha_visado'           => new sfValidatorDate(array('required' => false)),
      'observaciones'          => new sfValidatorString(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'created_by_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_by_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'deleted_at'             => new sfValidatorDateTime(array('required' => false)),
      'deleted_by_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dato_academico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DatoAcademico';
  }


}
