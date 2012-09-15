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
		unset($this['descripcion'], $this['created_at'], $this['user_created'], 
					$this['updated_at'], $this['user_updated'], $this['deleted_at'], 
					$this['user_deleted'], $this['nombre']
				);

    $contexto = sfContext::getInstance();

    $this->widgetSchema['id'] = new sfWidgetFormJQueryAutocompleter(array(
        'url'   => $contexto->getController()->genUrl('carrera/AutoComplete'),
        'value_callback' => array('Carrera', 'search'),
     ), array('autocomplete' => true));
    
		$this->widgetSchema['id']->setLabel('Nombre');

		$this->validatorSchema['id'] = new sfValidatorPass(array('required' => false));

	  $this->validatorSchema->setOption('allow_extra_fields', true);
	  $this->validatorSchema->setOption('filter_extra_fields', true);
  }

	public function getFields()
  {
    $fields = parent::getFields();
    $fields['id'] = 'Number';

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
