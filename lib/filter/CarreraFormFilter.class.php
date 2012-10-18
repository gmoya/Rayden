<?php

/**
 * Carrera filter form.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
class CarreraFormFilter extends BaseCarreraFormFilter
{
  public function configure()
  {
		unset($this['descripcion'], $this['created_at'], $this['created_by_id'], 
					$this['updated_at'], $this['updated_by_id'], $this['deleted_at'], 
					$this['deleted_by_id'], $this['nombre'], $this['observaciones']
				);

    $contexto = sfContext::getInstance();

    $this->widgetSchema['id'] = new sfWidgetFormJQueryAutocompleter(array(
        'url'   => $contexto->getController()->genUrl('carrera/AutoComplete'),
        'value_callback' => array('Carrera', 'search'),
     ), array('autocomplete' => true));
    
		$this->widgetSchema['id']->setLabel('Nombre');

		$this->validatorSchema['id'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema['estado'] = new sfWidgetFormChoice(array(
      	'choices' => array('' => '') + Carrera::getIdByNombreEstado(null, true),
    ));

    $this->validatorSchema['estado'] = new sfValidatorChoice(array(
      'required' => false,
      'choices' => Carrera::getIdByNombreEstado()
    ));

	  $this->validatorSchema->setOption('allow_extra_fields', true);
	  $this->validatorSchema->setOption('filter_extra_fields', true);
  }

	public function getFields()
  {
    $fields = parent::getFields();
    $fields['id'] = 'Number';
    $fields['estado'] = 'Boolean';

    return $fields;
  }

	public function addIdColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (is_numeric($values))
    {
			$criteria->add(CarreraPeer::ID, $values);
    }
	}

}
