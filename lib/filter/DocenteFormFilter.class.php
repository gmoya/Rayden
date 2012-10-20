<?php

/**
 * Docente filter form.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
class DocenteFormFilter extends BaseDocenteFormFilter
{
  public function configure()
  {
		unset($this['persona_id'], $this['created_at'], $this['created_by_id'], 
					$this['updated_at'], $this['updated_by_id'], $this['deleted_at'], 
					$this['deleted_by_id']
				);

    $contexto = sfContext::getInstance();
    $cultura = $contexto->getUser()->getCulture();

    $this->widgetSchema['estado'] = new sfWidgetFormChoice(array(
      	'choices' => array('' => '') + Docente::getIdByNombreEstado(null, true),
    ));

    $this->widgetSchema['legajo'] = new sfWidgetFormInput();
    $this->widgetSchema['carrera'] = new sfWidgetFormInput();
    $this->widgetSchema['nro_documento'] = new sfWidgetFormInput();

		$this->widgetSchema['nombre'] = new sfWidgetFormJQueryAutocompleter(array(
        'url'   => $contexto->getController()->genUrl('docente/AutoComplete'),
    		'value_callback' => array('Docente', 'search'),
    ), array('autocomplete' => true));

    $this->validatorSchema['legajo'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['nombre'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['nro_documento'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['carrera'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['estado'] = new sfValidatorChoice(array(
      'required' => false,
      'choices' => Docente::getIdByNombreEstado()
    ));

    $this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', true);

  }

  public function addNombreColumnCriteria(Criteria $criteria, $field, $values)
  {
    $criteria->add(DocentePeer::ID, $values, Criteria::EQUAL);
  }

  public function addNroDocumentoColumnCriteria(Criteria $criteria, $field, $values)
  {
    $criteria->addJoin(array(DocentePeer::PERSONA_ID,), array(PersonaPeer::ID,));
    $criteria->add(PersonaPeer::NRO_DOCUMENTO, $values, Criteria::EQUAL);
  }

  public function getFields()
  {
    $fields = parent::getFields();
    $fields['estado'] = 'Boolean';

    return $fields;
  }

}
